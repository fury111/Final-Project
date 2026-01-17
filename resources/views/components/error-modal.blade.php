<!-- Reusable Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger" id="errorModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Oops!
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-x-circle text-danger" style="font-size: 4rem;"></i>
                <p class="mt-3 mb-0 fs-5">We're sorry, something went wrong.</p>
                <p class="text-muted">Please try again.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="location.reload()">Try Again</button>
            </div>
        </div>
    </div>
</div>
