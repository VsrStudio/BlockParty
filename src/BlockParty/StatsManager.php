<?php

namespace BlockParty;

use pocketmine\player\Player;

class StatsManager {

    public function __construct() {
        // Konstruksi kelas, jika ada kode inisialisasi lainnya
    }

    public function getWins(Player $player): int {
        // Implementasi fungsi untuk mendapatkan jumlah kemenangan
        // Contoh:
        // return (int) $this->data[$player->getName()]["wins"] ?? 0;
    }

    public function getMatchesPlayed(Player $player): int {
        // Implementasi fungsi untuk mendapatkan jumlah pertandingan yang dimainkan
        // Contoh:
        // return (int) $this->data[$player->getName()]["matchesPlayed"] ?? 0;
    }
}
