<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProducts extends Component
{
    use WithPagination;

    public $category = null;
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
        if ($categoryId) {
            $this->category = Category::find($categoryId);
        }
    }

    public function render()
    {
        $query = Product::with('category', 'flashSale');

        // Apply category filter
        if ($this->category) {
            $query->where('category_id', $this->category->id);
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

        return view('livewire.category-products', [
            'products' => $products,
        ]);
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