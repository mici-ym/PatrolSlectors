<?php
/**
 * @file
 */

namespace MediaWiki\Extension\PatrolSlectors;

use MediaWiki\Hook\RecentChange_saveHook;
use MediaWiki\MediaWikiServices;


class main implements RecentChange_saveHook {

    public function onRecentChange_save( $recentChange ) {
        $config = MediaWikiServices::getInstance()->getMainConfig()
        $nameSpaces= $config->get('PatrolSlectorsNameSpaces');

        if (in_array($recentChange->getAttribute('rc_namespace'), $nameSpaces) && $recentChange->getAttribute('rc_patrolled') == 0) {
            $recentChange->setAttribute('rc_patrolled', 2);
        }

        /*
        $tags = $config->get('PatrolSlectorsTags');
        if (in_array($recentChange->getAttribute('rc_tag'), $tags) && $recentChange->getAttribute('rc_patrolled') == 0) {
            $recentChange->setAttribute('rc_patrolled', 2);
        }
        */
        
    }
}