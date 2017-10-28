<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$scripts = [];
$scripts["max_gear_enhancement"] = 20;
$scripts["max_acc_enhancement"] = 5;
$scripts["stats"] = "stat_types.json";
$scripts["rarities"] = "rarity_types.json";
$scripts["enhancements"] = "enhancement_levels.json";
$scripts["classes"] = "classes.json";
$scripts["training"] = "training_levels.json";
$scripts["set_effects"] = "set_effects.json";
$scripts["gems"] = "gems.json";
$scripts["items"] = [];
$scripts["items"]["helmets"] = "items/helmets.json";
$scripts["items"]["armor"] = "items/armor.json";
$scripts["items"]["shoes"] = "items/shoes.json";
$scripts["items"]["gloves"] = "items/gloves.json";
$scripts["items"]["earrings"] = "items/earrings.json";
$scripts["items"]["rings"] = "items/rings.json";
$scripts["items"]["necklaces"] = "items/necklaces.json";
$scripts["items"]["belts"] = "items/belts.json";
$scripts["items"]["alchemy-stones"] = "items/alchemy-stones.json";
$scripts["items"]["outfits"] = "items/outfits.json";
$scripts["items"]["main-weapon-outfits"] = "items/main-weapon-outfits.json";
$scripts["items"]["awakening-weapon-outfits"] = "items/awakening-weapon-outfits.json";
$scripts["items"]["secondary-weapon-outfits"] = "items/secondary-weapon-outfits.json";
$scripts["items"]["underwear"] = "items/underwear.json";
$scripts["items"]["main-weapons"] = [];
$scripts["items"]["main-weapons"]["berserker"] = "items/main-weapons/axe.json";
$scripts["items"]["main-weapons"]["ranger"] = "items/main-weapons/longbow.json";
$scripts["items"]["main-weapons"]["sorceress"] = "items/main-weapons/amulet.json";
$scripts["items"]["main-weapons"]["tamer"] = "items/main-weapons/shortsword.json";
$scripts["items"]["main-weapons"]["ninja"] = "items/main-weapons/shortsword.json";
$scripts["items"]["main-weapons"]["kunoichi"] = "items/main-weapons/shortsword.json";
$scripts["items"]["main-weapons"]["valkyrie"] = "items/main-weapons/longsword.json";
$scripts["items"]["main-weapons"]["warrior"] = "items/main-weapons/longsword.json";
$scripts["items"]["main-weapons"]["witch"] = "items/main-weapons/staff.json";
$scripts["items"]["main-weapons"]["wizard"] = "items/main-weapons/staff.json";
$scripts["items"]["main-weapons"]["musa"] = "items/main-weapons/blade.json";
$scripts["items"]["main-weapons"]["maehwa"] = "items/main-weapons/blade.json";
$scripts["items"]["main-weapons"]["darkknight"] = "items/main-weapons/kriegsmesser.json";
$scripts["items"]["main-weapons"]["striker"] = "items/main-weapons/gauntlet.json";
$scripts["items"]["main-weapons"]["mystic"] = "items/main-weapons/gauntlet.json";
$scripts["items"]["secondary-weapons"] = [];
$scripts["items"]["secondary-weapons"]["berserker"] = "items/secondary-weapons/ornamentalknot.json";
$scripts["items"]["secondary-weapons"]["darkknight"] = "items/secondary-weapons/ornamentalknot.json";
$scripts["items"]["secondary-weapons"]["ranger"] = "items/secondary-weapons/dagger.json";
$scripts["items"]["secondary-weapons"]["witch"] = "items/secondary-weapons/dagger.json";
$scripts["items"]["secondary-weapons"]["wizard"] = "items/secondary-weapons/dagger.json";
$scripts["items"]["secondary-weapons"]["sorceress"] = "items/secondary-weapons/talisman.json";
$scripts["items"]["secondary-weapons"]["tamer"] = "items/secondary-weapons/trinket.json";
$scripts["items"]["secondary-weapons"]["valkyrie"] = "items/secondary-weapons/shield.json";
$scripts["items"]["secondary-weapons"]["warrior"] = "items/secondary-weapons/shield.json";
$scripts["items"]["secondary-weapons"]["musa"] = "items/secondary-weapons/shortbow.json";
$scripts["items"]["secondary-weapons"]["maehwa"] = "items/secondary-weapons/shortbow.json";
$scripts["items"]["secondary-weapons"]["ninja"] = "items/secondary-weapons/shuriken.json";
$scripts["items"]["secondary-weapons"]["kunoichi"] = "items/secondary-weapons/kunai.json";
$scripts["items"]["secondary-weapons"]["striker"] = "items/secondary-weapons/vambrace.json";
$scripts["items"]["secondary-weapons"]["mystic"] = "items/secondary-weapons/vambrace.json";
$scripts["items"]["awakening-weapons"] = [];
$scripts["items"]["awakening-weapons"]["warrior"] = "items/awakening-weapons/greatsword.json";
$scripts["items"]["awakening-weapons"]["sorceress"] = "items/awakening-weapons/scythe.json";
$scripts["items"]["awakening-weapons"]["berserker"] = "items/awakening-weapons/ironbuster.json";
$scripts["items"]["awakening-weapons"]["ranger"] = "items/awakening-weapons/kamasylvensword.json";
$scripts["items"]["awakening-weapons"]["tamer"] = "items/awakening-weapons/bostaff.json";
$scripts["items"]["awakening-weapons"]["valkyrie"] = "items/awakening-weapons/lancia.json";
$scripts["items"]["awakening-weapons"]["musa"] = "items/awakening-weapons/crescentblade.json";
$scripts["items"]["awakening-weapons"]["maehwa"] = "items/awakening-weapons/kerispear.json";
$scripts["items"]["awakening-weapons"]["ninja"] = "items/awakening-weapons/surakatana.json";
$scripts["items"]["awakening-weapons"]["kunoichi"] = "items/awakening-weapons/chakram.json";
$scripts["items"]["awakening-weapons"]["witch"] = "items/awakening-weapons/aadsphera.json";
$scripts["items"]["awakening-weapons"]["wizard"] = "items/awakening-weapons/godrsphera.json";
$scripts["items"]["awakening-weapons"]["darkknight"] = "items/awakening-weapons/vediant.json";
$scripts["items"]["awakening-weapons"]["striker"] = "items/awakening-weapons/gardbrace.json";
$scripts["items"]["awakening-weapons"]["mystic"] = "items/awakening-weapons/mysticawakeningweapon.json";

/* Modified from D3Planner https://github.com/d07RiV/d3planner/blob/master/php/getter.php */

$timestamp = 0;

function buildScripts($scripts, &$timestamp) {
    $path = "../assets/db/";
    
    $compiledScripts = "";
    
    $first = true;
    
    foreach ($scripts as $key => $script) {
        if (!is_array($script)) {
            if (file_exists($path . $script)) {
                $timestamp = max($timestamp, filemtime($path . $script));
                $compiledScripts .= ($first ? '' : ',') . '"' . $key . '":' . file_get_contents($path . $script);
                $first = false;
            } else {
                $compiledScripts .= ($first ? '' : ',') . '"' . $key . '":' . $script;
                $first = false;
            }
        } else {
            $compiledScripts .= ($first ? '' : ',') . '"' . $key . '": {' . buildScripts($script, $timestamp) . '}';
        }
    }
    
    return $compiledScripts;
}

$compiledScripts = "var BDOdatabase = {" . buildScripts($scripts, $timestamp) . "};";

$timestampstring = gmdate('D, d M Y H:i:s ', $timestamp) . 'GMT';
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $timestampstring) {
    header('HTTP/1.1 304 Not Modified');
    exit();
}

$compiledScripts = gzencode($compiledScripts);
header('Content-Type: text/javascript; charset=utf-8');
header('Content-Encoding: gzip');
header('Last-Modified: ' . $timestampstring);
header('Content-Length: ' . strlen($compiledScripts));


echo $compiledScripts;
?>