<!-- resources/views/layouts/footer.blade.php -->
<footer>
    <div class="container">
        <p>تمامی حقوق این سایت محفوظ است - ۱۴۰۴</p>
    </div>
</footer>

<style>
    /* فوتر */
    footer {
        background-color: var(--darker-bg);
        padding: 15px 0;
        text-align: center;
        color: var(--secondary-color);
        margin-top: 20px;
        border-top: 1px solid var(--border-color);
        font-size: 0.85rem;
    }

    @media (max-width: 768px) {
        footer {
            padding: 10px 0;
            font-size: 0.8rem;
        }
    }
</style>

<!-- نشانگر بروزرسانی -->
<div class="update-indicator" id="update-indicator">
    اطلاعات در حال بروزرسانی...
</div>

<style>
    .update-indicator {
        position: fixed;
        bottom: 15px;
        left: 15px;
        background-color: var(--card-bg);
        color: var(--text-color);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .update-indicator.show {
        opacity: 1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // تابع نمایش نشانگر بروزرسانی
        function showUpdateIndicator() {
            const indicator = document.getElementById('update-indicator');
            indicator.classList.add('show');
            
            setTimeout(() => {
                indicator.classList.remove('show');
            }, 3000);
        }
        
        // نمایش نشانگر هر 10 دقیقه
        setInterval(showUpdateIndicator, 600000);
    });
</script>