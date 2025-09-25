// Multiple initialization attempts for better server compatibility
function initializeArtistNavigation() {
    const prevButton = document.getElementById('artist-prev');
    const nextButton = document.getElementById('artist-next');
    const currentArtistSpan = document.getElementById('current-artist');
    const totalArtistsSpan = document.getElementById('total-artists');
    const galleryContainer = document.getElementById('gallery-container');
    const artistDescription = document.getElementById('artist-description');
    const artistHeadline = document.getElementById('artist-headline');
    const mobileGallery = document.getElementById('mobile-gallery');
    const artistsDataElement = document.getElementById('artists-data');

    // Check if all required elements exist
    if (!prevButton || !nextButton || !currentArtistSpan || !totalArtistsSpan) {
        console.warn('Required artist navigation elements not found, retrying...');
        return false;
    }
    
    console.log('Artist navigation elements found, initializing...');

    let artistsData = [];
    if (artistsDataElement) {
        try {
            artistsData = JSON.parse(artistsDataElement.textContent.trim());
            console.log('Artists data loaded successfully:', artistsData.length, 'artists');
        } catch (e) {
            console.error('Error parsing artists data:', e);
            console.error('Raw data:', artistsDataElement.textContent);
            // Try to find the element again in case it wasn't ready
            const retryElement = document.getElementById('artists-data');
            if (retryElement && retryElement !== artistsDataElement) {
                try {
                    artistsData = JSON.parse(retryElement.textContent.trim());
                    console.log('Artists data loaded on retry:', artistsData.length, 'artists');
                } catch (retryE) {
                    console.error('Retry also failed:', retryE);
                }
            }
        }
    } else {
        console.warn('Artists data element not found');
        // Try to find it again
        const retryElement = document.getElementById('artists-data');
        if (retryElement) {
            try {
                artistsData = JSON.parse(retryElement.textContent.trim());
                console.log('Artists data found on retry:', artistsData.length, 'artists');
            } catch (e) {
                console.error('Retry parsing failed:', e);
            }
        }
    }
    
    const totalArtists = artistsData.length || 1;
    let currentArtist = 0;

    if (totalArtists <= 0) {
        prevButton.style.display = 'none';
        nextButton.style.display = 'none';
        return;
    }
    

    function nextArtist() {
        currentArtist = (currentArtist + 1) % totalArtists;
        updateArtistContent(currentArtist);
    }
    
    function prevArtist() {
        currentArtist = (currentArtist - 1 + totalArtists) % totalArtists;
        updateArtistContent(currentArtist);
    }
    
    function updateArtistContent(artistIndex) {
        const artist = artistsData[artistIndex];
        if (!artist) {
            console.warn('Artist data not found for index:', artistIndex);
            return;
        }
        
        console.log('Updating artist content for index:', artistIndex, 'Artist:', artist);
        
        if (artistDescription && artist.description) {
            artistDescription.innerHTML = nl2br(artist.description);
        }
        
        if (artistHeadline) {
            let headlineHTML = '';
            if (artist.headline_mobile) {
                headlineHTML += getImageHTML(artist.headline_mobile, 'headline-mobile');
            }
            if (artist.headline_desktop) {
                headlineHTML += getImageHTML(artist.headline_desktop, 'headline-desktop');
            }
            if (headlineHTML) {
                artistHeadline.innerHTML = headlineHTML;
            }
        }
        
        if (artist.gallery && artist.gallery.length > 0) {
            updateGalleryContent(artist.gallery);
        }
        
        if (currentArtistSpan) {
            currentArtistSpan.textContent = artistIndex + 1;
        }
    }
    
    function updateGalleryContent(gallery) {
        if (mobileGallery) {
            mobileGallery.innerHTML = gallery.map(item => createGalleryItemHTML(item, 'mobile')).join('');
        }
        
        if (galleryContainer) {
            galleryContainer.innerHTML = gallery.map((item, index) => 
                createGalleryItemHTML(item, 'desktop', index)
            ).join('');
        }
    }
    
    function createGalleryItemHTML(item, type, index = 0) {
        const first = item.first_headline || '';
        const second = item.second_headline || '';
        const desc = item.item_description || '';
        const email = item.email || '';
        const image = item.image || '';
        const imgHTML = getImageHTML(image);
        
        if (type === 'mobile') {
            return `
                <div class="artist-gallery-item">
                    ${first ? `<h3 class="artist-name">${first}</h3>` : ''}
                    ${second ? `<h4 class="artwork-title">${second}</h4>` : ''}
                    ${imgHTML ? `<div class="artist-gallery-image">${imgHTML}</div>` : ''}
                    ${desc ? `<p class="artwork-description">${nl2br(desc)}</p>` : ''}
                    ${email ? `<a href="mailto:${email}" class="artist-email">${email}</a>` : ''}
                </div>
            `;
        } else {
            const style = index === 0 ? 'style="display:block;"' : 'style="display:none;"';
            return `
                <div class="gallery-slide" data-slide="${index}" ${style}>
                    <div class="artist-details-upper">
                        ${first ? `<h3 class="artist-name-desktop">${first}</h3>` : ''}
                        ${second ? `<h4 class="artwork-title-desktop">${second}</h4>` : ''}
                    </div>
                    <div class="artist-gallery-item-desktop">
                        ${imgHTML}
                    </div>
                    <div class="artist-details-lower">
                        ${desc ? `<p class="artwork-description-desktop">${nl2br(desc)}</p>` : ''}
                        ${email ? `<a href="mailto:${email}" class="artist-email-desktop">${email}</a>` : ''}
                    </div>
                </div>
            `;
        }
    }
    
    function getImageHTML(image, className = '') {
        if (!image) return '';
        
        if (typeof image === 'object' && image.url) {
            return `<img class="${className}" src="${image.url}" alt="${image.alt || ''}" loading="lazy">`;
        } else if (typeof image === 'string' && image.startsWith('http')) {
            return `<img class="${className}" src="${image}" alt="" loading="lazy">`;
        }
        return '';
    }
    
    // Add event listeners
    nextButton.addEventListener('click', function(e) {
        e.preventDefault();
        nextArtist();
    });
    
    prevButton.addEventListener('click', function(e) {
        e.preventDefault();
        prevArtist();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevArtist();
        } else if (e.key === 'ArrowRight') {
            nextArtist();
        }
    });
    
    let startX = 0;
    let startY = 0;
    
    document.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });
    
    document.addEventListener('touchend', function(e) {
        if (!startX || !startY) {
            return;
        }
        
        const endX = e.changedTouches[0].clientX;
        const endY = e.changedTouches[0].clientY;
        
        const diffX = startX - endX;
        const diffY = startY - endY;
        
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
            if (diffX > 0) {
                nextArtist();
            } else {
                prevArtist();
            }
        }
        
        startX = 0;
        startY = 0;
    });
    
    // Initialize with first artist content (always initialize for consistent rendering)
    if (totalArtists > 0) {
        // Use setTimeout to ensure DOM is fully ready
        setTimeout(() => {
            updateArtistContent(0);
        }, 100);
    }
    
    // Mark elements as initialized
    if (prevButton) prevButton.setAttribute('data-initialized', 'true');
    if (nextButton) nextButton.setAttribute('data-initialized', 'true');
    
    return true; // Success
}

// Multiple initialization attempts with different timing strategies
function attemptInitialization() {
    let attempts = 0;
    const maxAttempts = 10;
    
    function tryInit() {
        attempts++;
        console.log(`Initialization attempt ${attempts}/${maxAttempts}`);
        
        if (initializeArtistNavigation()) {
            console.log('Artist navigation initialized successfully');
            return;
        }
        
        if (attempts < maxAttempts) {
            // Try again with increasing delay
            setTimeout(tryInit, 200 * attempts);
        } else {
            console.error('Failed to initialize artist navigation after', maxAttempts, 'attempts');
        }
    }
    
    tryInit();
}

// Try multiple initialization strategies
document.addEventListener('DOMContentLoaded', attemptInitialization);

// Fallback for cases where DOMContentLoaded already fired
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', attemptInitialization);
} else {
    // DOM is already ready
    attemptInitialization();
}

// Additional fallback after window load
window.addEventListener('load', function() {
    // Only try if not already initialized
    const prevButton = document.getElementById('artist-prev');
    if (prevButton && !prevButton.hasAttribute('data-initialized')) {
        console.log('Attempting initialization after window load...');
        attemptInitialization();
    }
});

// Helper function to convert newlines to <br> tags
function nl2br(str) {
    if (!str) return '';
    return str.replace(/\n/g, '<br>');
}