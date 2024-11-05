<?php

namespace BlockParty;

class StatsManager {
    private $plugin;

    public function __construct(BlockParty $plugin) {
        $this->plugin = $plugin;
    }

    public function getWins(Player $player): int {
        // Implementasi mengambil data kemenangan pemain
        return 0;
    }

    public function getMatchesPlayed(Player $player): int {
        // Implementasi mengambil data jumlah pertandingan yang dimainkan pemain
        return 0;
    }

    public function getLeaderboard(): array {
        // Implementasi mengambil data leaderboard
        return [];
    }
}
