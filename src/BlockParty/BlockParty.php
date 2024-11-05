<?php

namespace BlockParty;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class BlockParty extends PluginBase {

    private $gameManager;
    private $statsManager;
    private $commandHandler;

    public function onEnable(): void {
        $this->saveDefaultConfig(); // Simpan konfigurasi jika belum ada
        $this->getServer()->getCommandMap()->register("blockparty", new CommandHandler($this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->gameManager = new GameManager($this);
        $this->statsManager = new StatsManager($this);
        $this->commandHandler = new CommandHandler($this);
    }

    public function getGameManager(): GameManager {
        return $this->gameManager;
    }

    public function getStatsManager(): StatsManager {
        return $this->statsManager;
    }
}
