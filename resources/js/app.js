const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Mobile menu
{
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('mobile-menu-icon-open');
    const closeIcon = document.getElementById('mobile-menu-icon-close');

    if (button && menu) {
        button.addEventListener('click', () => {
            const isOpen = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            menu.classList.toggle('is-open');
            button.setAttribute('aria-expanded', String(!isOpen));
            openIcon?.classList.toggle('hidden', !isOpen);
            closeIcon?.classList.toggle('hidden', isOpen);
        });
    }
}

// Sticky header: frost + shadow after scrolling
{
    const header = document.querySelector('[data-header]');
    if (header) {
        const update = () => {
            if (window.scrollY > 8) {
                header.classList.add('shadow-[0_10px_30px_-18px_rgba(14,42,78,0.35)]');
            } else {
                header.classList.remove('shadow-[0_10px_30px_-18px_rgba(14,42,78,0.35)]');
            }
        };
        update();
        window.addEventListener('scroll', update, { passive: true });
    }
}

// Scroll reveal
{
    const items = document.querySelectorAll('.reveal');
    if (items.length && !prefersReducedMotion && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );
        items.forEach((el) => observer.observe(el));
    } else {
        items.forEach((el) => el.classList.add('is-visible'));
    }
}

// Gallery lightbox
{
    const gallery = document.querySelector('[data-gallery]');
    if (gallery) {
        const lightbox = document.createElement('div');
        lightbox.className =
            'fixed inset-0 z-[60] hidden items-center justify-center bg-ink/90 p-4 backdrop-blur-sm';
        lightbox.setAttribute('role', 'dialog');
        lightbox.setAttribute('aria-modal', 'true');
        lightbox.setAttribute('aria-label', 'Pratinjau foto galeri');
        lightbox.innerHTML = `
            <button type="button" data-lightbox-close aria-label="Tutup"
                class="absolute right-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-white/20">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <figure class="max-h-full max-w-5xl">
                <img data-lightbox-img src="" alt="" class="mx-auto max-h-[78vh] w-auto rounded-2xl shadow-2xl object-contain" />
                <figcaption data-lightbox-caption class="mt-4 text-center text-sm text-white/85"></figcaption>
            </figure>
        `;
        gallery.appendChild(lightbox);

        const imgEl = lightbox.querySelector('[data-lightbox-img]');
        const captionEl = lightbox.querySelector('[data-lightbox-caption]');
        const closeBtn = lightbox.querySelector('[data-lightbox-close]');

        const open = () => {
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
            closeBtn.focus();
        };
        const close = () => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        };

        gallery.querySelectorAll('[data-lightbox-trigger]').forEach((trigger) => {
            let openPhoto = (event) => {
                event.preventDefault();
                const src = trigger.dataset.src || trigger.dataset.fullsize || trigger.dataset.original;
                const alt = trigger.dataset.alt || trigger.querySelector('img')?.alt || '';
                const title = trigger.dataset.title || '';
                const meta = trigger.dataset.meta || '';
                imgEl.src = src;
                imgEl.alt = alt;
                if (prefersReducedMotion) {
                    open();
                } else {
                    imgEl.classList.add('scale-95');
                    open();
                    requestAnimationFrame(() => requestAnimationFrame(() => imgEl.classList.remove('scale-95')));
                }
                captionEl.innerHTML = title
                    ? `${title}${meta ? `<span class="block text-xs opacity-70 mt-0.5">${meta}</span>` : ''}`
                    : '';
            };

            trigger.addEventListener('click', openPhoto);
            trigger.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    openPhoto(event);
                }
            });
        });

        closeBtn.addEventListener('click', close);
        lightbox.addEventListener('click', (event) => {
            if (event.target === lightbox) close();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !lightbox.classList.contains('hidden')) close();
        });
    }
}