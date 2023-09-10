<?php

namespace it3;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

final class Loader extends PluginBase implements Listener{
  
  protected function onEnable() : void {
    $this->saveResouce("config.yml");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onJoin(PlayerJoinEvent $event) : void {
    $p = $event->getPlayer();
    $event->setJoinMessage(TextFormat::colorize(str_replace(["{player}"], [$p->getName()], $this->getConfig()->get("message"))));
  }
}
?>