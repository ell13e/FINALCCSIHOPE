/**
 * Location Maps Integration
 * 
 * Handles Google Maps or other map service integration for location pages
 *
 * @package CTA_Theme
 */

(function() {
    'use strict';

    // Location data
    const locations = {
        maidstone: {
            name: 'The Maidstone Studios',
            lat: 51.264494,
            lng: 0.545844,
            address: 'The Maidstone Studios, New Cut Road, Maidstone, Kent ME14 5NZ',
            phone: '01622 587343'
        },
        medway: {
            name: 'Medway Training Area',
            lat: 51.4044,
            lng: 0.5269,
            area: 'Chatham, Gillingham, Rochester, Strood'
        },
        canterbury: {
            name: 'Canterbury Training Area',
            lat: 51.2802,
            lng: 1.0789,
            area: 'Canterbury, Whitstable, Herne Bay, Margate'
        },
        ashford: {
            name: 'Ashford Training Area',
            lat: 51.1465,
            lng: 0.8735,
            area: 'Ashford, Tenterden, New Romney, Folkestone'
        },
        tunbridgeWells: {
            name: 'Tunbridge Wells Training Area',
            lat: 51.1322,
            lng: 0.2630,
            area: 'Tunbridge Wells, Southborough, Tonbridge, Sevenoaks'
        }
    };

    /**
     * Initialize map for a location
     * Integrates with Google Maps API using key from WordPress admin settings
     */
    function initLocationMap(containerId, locationKey) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const location = locations[locationKey];
        if (!location) return;

        // Check if Google Maps API is loaded
        if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
            // Fallback to link if API not loaded
            container.innerHTML = `
                <div class="location-map-placeholder">
                    <div style="text-align: center; padding: 20px;">
                        <i class="fas fa-map-marked-alt" style="font-size: 3rem; color: var(--green-primary); margin-bottom: 16px;"></i>
                        <h3 style="margin: 0 0 8px 0;">${location.name}</h3>
                        <p style="margin: 0; color: var(--brown-medium);">${location.address || location.area}</p>
                        <a href="https://www.google.com/maps/search/?api=1&query=${location.lat},${location.lng}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn btn-secondary" 
                           style="margin-top: 16px; display: inline-block;">
                            Open in Google Maps
                        </a>
                    </div>
                </div>
            `;
            return;
        }

        // Custom map styling
        const mapStyles = [
            {
                featureType: 'poi',
                elementType: 'labels',
                stylers: [{ visibility: 'off' }]
            },
            {
                featureType: 'transit',
                elementType: 'labels.icon',
                stylers: [{ visibility: 'off' }]
            }
        ];

        // Initialize Google Map
        const map = new google.maps.Map(container, {
            center: { lat: location.lat, lng: location.lng },
            zoom: 14,
            styles: mapStyles,
            mapTypeControl: false,
            streetViewControl: true,
            fullscreenControl: true
        });

        // Add marker
        const marker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            title: location.name,
            animation: google.maps.Animation.DROP
        });

        // Info window content
        const infoWindowContent = `
            <div style="padding: 12px; max-width: 250px;">
                <h3 style="margin: 0 0 8px 0; color: #2B1B0E; font-size: 1.1rem;">${location.name}</h3>
                <p style="margin: 0 0 8px 0; color: #5C4A3A; font-size: 0.9rem;">${location.address || location.area}</p>
                ${location.phone ? `<p style="margin: 0; font-size: 0.9rem;"><strong>Phone:</strong> <a href="tel:${location.phone.replace(/\s/g, '')}" style="color: #4A7C59;">${location.phone}</a></p>` : ''}
                <a href="https://www.google.com/maps/dir/?api=1&destination=${location.lat},${location.lng}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   style="display: inline-block; margin-top: 8px; color: #4A7C59; text-decoration: underline;">
                    Get Directions
                </a>
            </div>
        `;

        const infoWindow = new google.maps.InfoWindow({
            content: infoWindowContent
        });

        // Show info window on marker click
        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });

        // Open info window by default for main location
        if (locationKey === 'maidstone') {
            infoWindow.open(map, marker);
        }
    }

    /**
     * Calculate and display travel time (placeholder)
     */
    function displayTravelTime(fromLocation, toLocation) {
        // This would integrate with Google Maps Distance Matrix API
        // For now, it's a placeholder
        console.log(`Travel time from ${fromLocation} to ${toLocation}: Use Distance Matrix API`);
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
