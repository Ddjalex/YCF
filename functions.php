<?php
// functions.php - Global utility functions

/**
 * Formats a date for the countdown timer
 */
function get_target_date() {
    // Set target to some date in 2026 for the "2025" theme feel
    return "October 24, 2026 09:00:00";
}

/**
 * Mock data for news items
 */
function get_latest_news() {
    return [
        [
            'title' => 'UNPSF 2025: Strengthening International Cooperation',
            'date' => 'October 15, 2025',
            'summary' => 'Leaders gather to discuss the future of global peace and security frameworks.',
            'category' => 'Press Release'
        ],
        [
            'title' => 'Regional Consultations Announced',
            'date' => 'October 12, 2025',
            'summary' => 'Pre-summit workshops will be held across five continents to ensure inclusive dialogue.',
            'category' => 'Update'
        ],
        [
            'title' => 'Registration Now Open for Accredited Media',
            'date' => 'October 10, 2025',
            'summary' => 'Journalists can now apply for accreditation to cover the upcoming summit.',
            'category' => 'Announcement'
        ]
    ];
}
?>