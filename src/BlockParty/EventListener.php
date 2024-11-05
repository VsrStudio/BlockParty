<?php

namespace BlockParty;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class EventListener implements Listener {

    private $plugin;

    public function __construct(BlockParty $plugin) {
        $this->plugin = $plugin;
    }

    /**
     * Event yang dipicu saat pemain bergabung ke server.
     */
    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendMessage(TextFormat::AQUA . "Selamat datang di BlockParty! Gunakan /blockparty untuk bergabung dalam permainan.");
    }

    /**
     * Event yang dipicu saat pemain keluar dari server.
     */
    public function onPlayerQuit(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        
        // Hapus pemain dari permainan jika mereka keluar
        if ($this->plugin->getGameManager()->isPlayerInGame($player)) {
            $this->plugin->getGameManager()->removePlayerFromGame($player);
        }
    }

    /**
     * Event yang dipicu saat pemain bergerak.
     * Ini dapat digunakan untuk mendeteksi jika pemain berdiri di atas blok yang salah.
     */
    public function onPlayerMove(PlayerMoveEvent $event): void {
        $player = $event->getPlayer();
        
        if ($this->plugin->getGameManager()->isGameRunning() && $this->plugin->getGameManager()->isPlayerInGame($player)) {
            // Cek apakah pemain berada di blok yang benar
            if (!$this->plugin->getGameManager()->isPlayerOnCorrectBlock($player)) {
                $this->plugin->getGameManager()->eliminatePlayer($player);
                $player->sendMessage(TextFormat::RED . "Kamu dieliminasi! Kamu berdiri di blok yang salah.");
            }
        }
    }

    /**
     * Event yang dipicu saat pemain mati dalam permainan.
     */
    public function onPlayerDeath(PlayerDeathEvent $event): void {
        $player = $event->getPlayer();
        
        if ($this->plugin->getGameManager()->isPlayerInGame($player)) {
            $event->setDrops([]); // Hapus item yang jatuh saat pemain mati dalam permainan
            $this->plugin->getGameManager()->eliminatePlayer($player);
            $player->sendMessage(TextFormat::RED . "Kamu dieliminasi dari BlockParty.");
        }
    }
}
