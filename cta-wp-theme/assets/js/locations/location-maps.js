/**
 * Location Maps Integration
 * 
 * SECURITY: Uses Google Maps iframe embeds (no API key required)
 * This is the secure approach - API keys should never be exposed in frontend code
 *
 * @package CTA_Theme
 */

(function() {
    'use strict';

    // Location data with embed URLs
    const locations = {
        maidstone: {
            name: 'The Maidstone Studios',
            lat: 51.264494,
            lng: 0.545844,
            address: 'The Maidstone Studios, New Cut Road, Maidstone, Kent ME14 5NZ',
            phone: '01622 587343',
            // Google Maps embed URL (no API key needed)
            embedUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d0.546680377251131!3d51.27952727176235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2sContinuity%20Training%20Academy!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk'
        },
        medway: {
            name: 'Medway Training Area',
            lat: 51.4044,
            lng: 0.5269,
            area: 'Chatham, Gillingham, Rochester, Strood',
            embedUrl: `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d0.5269!3d51.4044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2sMedway!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk`
        },
        canterbury: {
            name: 'Canterbury Training Area',
            lat: 51.2802,
            lng: 1.0789,
            area: 'Canterbury, Whitstable, Herne Bay, Margate',
            embedUrl: `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d1.0789!3d51.2802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2sCanterbury!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk`
        },
        ashford: {
            name: 'Ashford Training Area',
            lat: 51.1465,
            lng: 0.8735,
            area: 'Ashford, Tenterden, New Romney, Folkestone',
            embedUrl: `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d0.8735!3d51.1465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2sAshford!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk`
        },
        tunbridgeWells: {
            name: 'Tunbridge Wells Training Area',
            lat: 51.1322,
            lng: 0.2630,
            area: 'Tunbridge Wells, Southborough, Tonbridge, Sevenoaks',
            embedUrl: `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d0.2630!3d51.1322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2sTunbridge%20Wells!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk`
        }
    };

    /**
     * Initialize map for a location using iframe embed (secure, no API key)
     */
    function initLocationMap(containerId, locationKey) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const location = locations[locationKey];
        if (!location) return;

        // Use iframe embed (no API key required, secure)
        container.innerHTML = `
            <div class="location-map-wrapper" style="position: relative; width: 100%; height: 100%; min-height: 400px;">
                <iframe
                    src="${location.embedUrl || `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.717049057254!2d${location.lng}!3d${location.lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47df3394790a6a17%3A0x6bb94452df2da3f5!2s${encodeURIComponent(location.name)}!5e0!3m2!1sen!2suk!4v1766494532400!5m2!1sen!2suk`}"
                    width="100%"
                    height="100%"
                    style="border:0; min-height: 400px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="${location.name} Location Map"
                    aria-label="Map showing ${location.name} location${location.address ? ' at ' + location.address : ''}"
                ></iframe>
            </div>
        `;
    }

    /**
     * Initialize all maps on page load
     */
    function init() {
        // Check if we're on a location page
        const mapContainers = document.querySelectorAll('[data-location-map]');
        
        mapContainers.forEach(container => {
            const locationKey = container.dataset.locationMap;
            initLocationMap(container.id, locationKey);
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Export for use in other scripts
    window.CTALocationMaps = {
        init: init,
        initLocationMap: initLocationMap,
        locations: locations
    };

})();
