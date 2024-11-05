<?php

namespace BlockParty;

class GameManager {
    private $plugin;
    private $isRunning = false;

    public function __construct(BlockParty $plugin) {
        $this->plugin = $plugin;
    }

    public function isGameRunning(): bool {
        return $this->isRunning;
    }

    public function startGame(): void {
        $this->isRunning = true;
        // Tambahkan logika permainan di sini
    }
}
