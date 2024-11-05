<?php

namespace BlockParty;

use pocketmine\plugin\PluginBase;

class BlockParty extends PluginBase {

    public function onEnable(): void {
        $this->getServer()->getCommandMap()->register("blockparty", new CommandHandler($this));
        // Kode lainnya...
    }
    // Kode lainnya...
}
