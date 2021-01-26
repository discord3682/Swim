<?php

/**
 * @name Swim
 * @main discord3682\swim\Swim
 * @author discord3682
 * @version 0.0.1
 * @api 3.0.0
 */

namespace discord3682\swim;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\Listener;
use pocketmine\entity\Entity;
use pocketmine\Player;

class Swim extends PluginBase implements Listener
{

  public function onEnable () : void
  {
    $this->getServer ()->getPluginManager ()->registerEvents ($this, $this);
  }

  public function onPlayerMove (PlayerMoveEvent $ev) : void
  {
    $player = $ev->getPlayer ();

    if ($player->isUnderWater ())
    {
      if ($player->isSprinting ())
      {
        $this->setMotion ($player, true);
      }else
      {
        $this->setMotion ($player, false);
      }
    }else
    {
      $this->setMotion ($player, false);
    }
  }

  public function setMotion (Player $player, bool $value) : void
  {
    $player->setDataFlag (Entity::DATA_FLAGS, Entity::DATA_FLAG_SWIMMING, $value);
  }
}
