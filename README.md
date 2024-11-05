# BlockParty Plugin

BlockParty is a mini-game plugin for **PocketMine-MP**. In this game, players must stand on blocks of a specified color before time runs out. Players on the wrong block will be eliminated, and the last player standing is the winner.

## Features

- Start the BlockParty game with commands.
- Player statistics and leaderboard.
- Configurable game duration, lobby duration, and block colors.
- Automatic elimination for players on the wrong block.
- Supports PocketMine-MP API 5.

## Requirements

- **PocketMine-MP**: Latest version (API 5.0.0+).
- **PHP**: Compatible with the PocketMine-MP version.

## Installation

1. Download or clone this plugin.
2. Move the `BlockParty` folder into the `plugins` directory of your PocketMine-MP server.
3. Restart the server to load the plugin.

## Configuration

The `config.yml` file will be automatically generated after activating the plugin. Available settings:
yaml
game_duration: 60          # Game duration in seconds
lobby_duration: 30         # Lobby duration before the game starts
available_colors:          # List of available block colors
  - red
  - green
  - blue
  - yellow
  - purple
  - cyan

## Commands

/blockparty start: Starts the game.

/blockparty stats: Displays player statistics.

/blockparty leaderboard: Displays the leaderboard.

/blockparty setduration <seconds>: Sets the game duration.

/blockparty setlobby <seconds>: Sets the lobby duration.

/blockparty setcolors <color1,color2,...>: Sets available block colors (e.g., /blockparty setcolors red,blue,green).


How to Play

1. Use /blockparty start to start the game.

2. Players will be assigned a block color.

3. Players must stand on the correct color block before time runs out.

4. Players on the wrong color will be eliminated.

5. The last player standing wins.
