<div class="menu-container">
    <div class="menu">
        <a href="{{ route('markets.gold') }}" class="menu-item">
            <i class="fas fa-coins"></i>
            <span>طلا</span>
        </a>

        <a href="{{ route('markets.silver') }}" class="menu-item">
            <i class="fas fa-ring"></i>
            <span>نقره</span>
        </a>

        <a href="{{ route('markets.stocks') }}" class="menu-item">
            <i class="fas fa-chart-line"></i>
            <span>بورس</span>
        </a>

        <a href="{{ route('markets.crypto') }}" class="menu-item">
            <i class="fab fa-bitcoin"></i>
            <span>ارز دیجیتال</span>
        </a>

        <a href="{{ route('markets.oil') }}" class="menu-item">
            <i class="fas fa-gas-pump"></i>
            <span>نفت</span>
        </a>

        <a href="{{ route('markets.tools') }}" class="menu-item">
            <i class="fas fa-tools"></i>
            <span>ابزار</span>
        </a>

        <a href="{{ route('markets.analysis') }}" class="menu-item">
            <i class="fas fa-chart-bar"></i>
            <span>تحلیل‌ها</span>
        </a>
    </div>
</div>

<style>
.menu-container {
    background: var(--darker-bg);
    padding: 1rem;
    border-radius: 10px;
    margin: 1rem;
}

.menu {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
}

.menu-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    background: var(--card-bg);
    border-radius: 8px;
    text-decoration: none;
    color: var(--text-color);
    transition: all 0.3s ease;
}

.menu-item:hover {
    transform: translateY(-5px);
    background: var(--primary-color);
    color: white;
}

.menu-item i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.menu-item span {
    font-size: 0.9rem;
}

/* Active state */
.menu-item.active {
    background: var(--primary-color);
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .menu {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    }

    .menu-item {
        padding: 0.8rem;
    }

    .menu-item i {
        font-size: 1.5rem;
    }

    .menu-item span {
        font-size: 0.8rem;
    }
}
</style>