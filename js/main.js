// Theme Toggle Logic
const themeToggleCheckbox = document.getElementById('theme-toggle');

// Set initial state based on localStorage or system preference
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    themeToggleCheckbox.checked = true;
} else {
    document.documentElement.classList.remove('dark');
    themeToggleCheckbox.checked = false;
}

themeToggleCheckbox.addEventListener('change', function() {
    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
});

// AJAX Helper for Likes
async function toggleLike(event, type, id) {
    if (event) event.preventDefault();
    
    // Find the button (either from event or by standard selector)
    const btn = event ? event.currentTarget : document.querySelector(`[onclick*="toggleLike"][onclick*="'${type}'"][onclick*="${id}"]`);
    if (!btn) return;
    
    const icon = btn.querySelector('i');
    
    try {
        const response = await fetch(`api/like.php?type=${type}&id=${id}`, { method: 'POST' });
        const data = await response.json();
        
        if (data.success) {
            const likeCount = document.getElementById(`like-count-${type}-${id}`);
            if (likeCount) {
                // Animate count change
                likeCount.classList.add('scale-125', 'text-red-500');
                likeCount.innerText = data.newLikes;
                setTimeout(() => likeCount.classList.remove('scale-125', 'text-red-500'), 200);
            }
            
            if (icon) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid', 'text-red-500');
                
                // Pop animation
                btn.classList.add('scale-125');
                setTimeout(() => btn.classList.remove('scale-125'), 200);
            }
        }
    } catch (error) {
        console.error('Error liking:', error);
    }
}
