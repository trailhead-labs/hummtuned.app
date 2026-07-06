// Flag that JS is live so the stylesheet can hand the FAQ height animation over
// to the class the accordion toggles, while a no-JS visit still expands answers.
document.documentElement.classList.add('js');

// Scroll reveal: fade each .reveal element in as it crosses into view, then
// stop watching it. The CSS disables this entirely under reduced motion, so
// there is nothing to gate here.
const revealables = document.querySelectorAll('.reveal');

if (revealables.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    observer.unobserve(entry.target);
                }
            }
        },
        { threshold: 0.12 },
    );

    revealables.forEach((el) => observer.observe(el));
}

// SVG graphics that draw and ping only once they scroll well into view, so the
// animation never plays off screen. Reduced motion skips the whole thing in CSS.
const animated = document.querySelectorAll('.anim-when-visible');

if (animated.length) {
    const io = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    io.unobserve(entry.target);
                }
            }
        },
        { threshold: 0.6 },
    );

    animated.forEach((el) => io.observe(el));
}

// Science tabs: show one section at a time, keep the hash in sync so panels are
// deep-linkable, and scroll the panels into view only on a real user click. The
// whole block is skipped on pages that carry no tabs.
const sciTabs = Array.from(document.querySelectorAll('.sci-tab'));

if (sciTabs.length) {
    const names = ['beats', 'carrier', 'evidence', 'programs', 'shape', 'citations'];
    const panels = Array.from(document.querySelectorAll('.sci-panel'));
    const top = document.getElementById('sci-panels');
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function activate(name, scroll) {
        if (!names.includes(name)) {
            name = 'beats';
        }

        sciTabs.forEach((tab) => {
            const on = tab.dataset.tab === name;
            tab.classList.toggle('is-active', on);
            tab.setAttribute('aria-selected', on ? 'true' : 'false');
        });

        panels.forEach((panel) => {
            panel.hidden = panel.id !== 'panel-' + name;
        });

        if (history.replaceState) {
            history.replaceState(null, '', '#' + name);
        }

        if (scroll) {
            top.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
        }
    }

    sciTabs.forEach((tab) => tab.addEventListener('click', () => activate(tab.dataset.tab, true)));
    window.addEventListener('hashchange', () => activate(location.hash.replace('#', ''), true));
    activate(location.hash.replace('#', ''), false);
}

// FAQ accordion: toggle .is-open on the item, which slides the answer with the
// grid-rows trick, and mirror the state onto the button's aria-expanded. The CSS
// handles the animation, including collapsing it under reduced motion.
document.querySelectorAll('.faq').forEach((faq) => {
    const button = faq.querySelector('button[aria-expanded]');

    if (! button) {
        return;
    }

    button.addEventListener('click', () => {
        const open = faq.classList.toggle('is-open');
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
});

// Horizontal card sliders: touch and trackpad scroll natively; on a mouse the
// whole strip is grab-and-drag. Snap is suspended mid-drag so the motion tracks
// the cursor, then restored so it settles onto a card. A drag never fires the
// click underneath it.
document.querySelectorAll('[data-slider]').forEach((slider) => {
    let dragging = false;
    let startX = 0;
    let startLeft = 0;
    let moved = 0;

    slider.addEventListener('pointerdown', (event) => {
        if (event.pointerType !== 'mouse') {
            return;
        }

        dragging = true;
        moved = 0;
        startX = event.clientX;
        startLeft = slider.scrollLeft;
        slider.style.scrollSnapType = 'none';
        slider.style.cursor = 'grabbing';
        slider.setPointerCapture(event.pointerId);
    });

    slider.addEventListener('pointermove', (event) => {
        if (! dragging) {
            return;
        }

        const dx = event.clientX - startX;
        moved = Math.max(moved, Math.abs(dx));
        slider.scrollLeft = startLeft - dx;
    });

    const release = () => {
        if (! dragging) {
            return;
        }

        dragging = false;
        slider.style.scrollSnapType = '';
        slider.style.cursor = '';
    };

    slider.addEventListener('pointerup', release);
    slider.addEventListener('pointercancel', release);

    slider.addEventListener('click', (event) => {
        if (moved > 6) {
            event.preventDefault();
            event.stopPropagation();
        }
    }, true);
});
