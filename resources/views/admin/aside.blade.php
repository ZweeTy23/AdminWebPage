<div class="col-md-3 mb-4">
    <div class="card shadow-lg border-0 overflow-hidden" style="background: #121212;">
        <div class="card-header border-bottom border-secondary bg-transparent py-3">
            <h6 class="m-0 text-uppercase fw-bold text-white" style="letter-spacing: 2px;">
                Menu <span style="color: #00f2ea;">//</span>
            </h6>
        </div>
        <div class="list-group list-group-flush">

            <!-- Profile -->
            <a href="{{ route('profile.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-person-circle me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Profile Config</span>
            </a>

            <!-- Slider -->
            <a href="{{ route('slide.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-images me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Carousel</span>
            </a>

            <!-- Pages -->
            <a href="{{ route('page.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-file-earmark-text me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Static Pages</span>
            </a>

            <!-- Categories -->
            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-tags me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Categories</span>
            </a>

            <!-- Products (Agregado para que puedas entrar) -->
            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-box-seam me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Products</span>
            </a>

            <!-- Posts -->
            <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action bg-transparent text-light border-secondary py-3 d-flex align-items-center">
                <i class="bi bi-journal-text me-3 fs-5" style="color: #555;"></i>
                <span class="text-uppercase small fw-bold" style="letter-spacing: 1px;">Journal Posts</span>
            </a>

        </div>
    </div>
</div>
