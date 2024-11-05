<?php

namespace BlockParty;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat;

class CommandHandler implements CommandExecutor {

    private $plugin;

    public function __construct(BlockParty $plugin) {
        $this->plugin = $plugin;
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "Hanya pemain yang bisa menggunakan perintah ini.");
            return true;
        }

        if (count($args) < 1) {
            $sender->sendMessage(TextFormat::RED . "Penggunaan yang benar: /blockparty <start|stats|leaderboard|setduration|setlobby|setcolors>");
            return true;
        }

        switch ($args[0]) {
            case "start":
                if ($this->plugin->getGameManager()->isGameRunning()) {
                    $sender->sendMessage(TextFormat::RED . "Permainan sudah berjalan!");
                } else {
                    $this->plugin->getGameManager()->startGame();
                    $sender->sendMessage(TextFormat::GREEN . "Permainan dimulai!");
                }
                break;

            case "stats":
                $wins = $this->plugin->getStatsManager()->getWins($sender);
                $matchesPlayed = $this->plugin->getStatsManager()->getMatchesPlayed($sender);
                $sender->sendMessage(TextFormat::GOLD . "Statistik Anda: " . $wins . " Kemenangan, " . $matchesPlayed . " Pertandingan Dimainkan.");
                break;

            case "leaderboard":
                $leaderboard = $this->plugin->getStatsManager()->getLeaderboard();
                $content = "Leaderboard:\n";
                foreach ($leaderboard as $name => $wins) {
                    $content .= TextFormat::GREEN . "$name: $wins kemenangan\n";
                }
                $sender->sendMessage($content);
                break;

            case "setduration":
                if (count($args) < 2 || !is_numeric($args[1])) {
                    $sender->sendMessage(TextFormat::RED . "Penggunaan yang benar: /blockparty setduration <detik>");
                    return true;
                }
                $this->plugin->getConfig()->set("game_duration", (int)$args[1]);
                $this->plugin->getConfig()->save();
                $sender->sendMessage(TextFormat::GREEN . "Durasi permainan diatur menjadi " . $args[1] . " detik.");
                break;

            case "setlobby":
                if (count($args) < 2 || !is_numeric($args[1])) {
                    $sender->sendMessage(TextFormat::RED . "Penggunaan yang benar: /blockparty setlobby <detik>");
                    return true;
                }
                $this->plugin->getConfig()->set("lobby_duration", (int)$args[1]);
                $this->plugin->getConfig()->save();
                $sender->sendMessage(TextFormat::GREEN . "Durasi lobby diatur menjadi " . $args[1] . " detik.");
                break;

            case "setcolors":
                if (count($args) < 2) {
                    $sender->sendMessage(TextFormat::RED . "Penggunaan yang benar: /blockparty setcolors <color1,color2,...>");
                    return true;
                }
                $colors = explode(",", $args[1]);
                $this->plugin->getConfig()->set("available_colors", $colors);
                $this->plugin->getConfig()->save();
                $sender->sendMessage(TextFormat::GREEN . "Warna blok diatur menjadi: " . implode(", ", $colors));
                break;

            default:
                $sender->sendMessage(TextFormat::RED . "Penggunaan yang benar: /blockparty <start|stats|leaderboard|setduration|setlobby|setcolors>");
                break;
        }

        return true;
    }
}
