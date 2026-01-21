<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $categoryId = null;
    public $inStock = false;
    public $priceMin = null;
    public $priceMax = null;
    public $sortBy = 'newest';
    public $search = '';

    protected $queryString = [
        'inStock' => ['except' => false],
        'priceMin' => ['except' => null],
        'priceMax' => ['except' => null],
        'sortBy' => ['except' => 'newest'],
        'search' => ['except' => ''],
    ];

    public function mount($categoryId = null)
    {
        $this->categoryId = $categoryId;
    }

    public function render()
    {
        $query = Product::with('category', 'flashSale');

        // Apply category filter
        if ($this->categoryId) {
            $query->where('category_id', $this->categoryId);
        }

        // Apply stock filter
        if ($this->inStock) {
            $query->where('stock_quantity', '>', 0);
        }

        // Apply price filters
        if ($this->priceMin) {
            $query->where('price', '>=', $this->priceMin);
        }
        if ($this->priceMax) {
            $query->where('price', '<=', $this->priceMax);
        }

        // Apply search
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'best_selling':
                $query->orderBy('sales_count', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12);
        $categories = Category::all();
        $category = $this->categoryId ? Category::find($this->categoryId) : null;

        return view('livewire.category-filter', compact('products', 'categories', 'category'));
    }

    public function clearFilters()
    {
        $this->reset(['inStock', 'priceMin', 'priceMax', 'search']);
    }

    public function removeFilter($filter)
    {
        switch ($filter) {
            case 'in_stock':
                $this->inStock = false;
                break;
            case 'price_min':
                $this->priceMin = null;
                break;
            case 'price_max':
                $this->priceMax = null;
                break;
            case 'search':
                $this->search = '';
                break;
        }
    }
}