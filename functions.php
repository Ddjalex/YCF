<?php
// functions.php - Global utility functions

/**
 * Formats a date for the countdown timer
 */
function get_target_date() {
    // Check for a saved countdown date, or use default
    $saved_date = @file_get_contents('countdown_date.txt');
    return $saved_date ?: "December 15, 2026 09:00:00";
}

/**
 * Mock data for news items
 */
function get_latest_news() {
    $news_file = 'news_data.json';
    if (file_exists($news_file)) {
        return json_decode(file_get_contents($news_file), true);
    }
    
    return [
        [
            'title' => 'Youth Crypto Forum 2026: The Future of Decentralization',
            'date' => 'January 10, 2026',
            'summary' => 'Join thousands of young innovators in Berlin to discuss blockchain and the global economy.',
            'category' => 'Press Release'
        ],
        [
            'title' => 'Berlin to Host Major Blockchain Summit',
            'date' => 'January 05, 2026',
            'summary' => 'Germany\'s capital preparing for the largest youth-focused crypto event in Europe.',
            'category' => 'Update'
        ],
        [
            'title' => 'Registration for Early Bird Tickets Now Open',
            'date' => 'January 02, 2026',
            'summary' => 'Secure your spot at the Youth Crypto Forum with special early bird pricing available now.',
            'category' => 'Announcement'
        ]
    ];
}
?>