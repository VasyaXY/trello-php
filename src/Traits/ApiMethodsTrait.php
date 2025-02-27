<?php

namespace vasyaxy\Services\Trello\Traits;

use BadMethodCallException;

trait ApiMethodsTrait
{
    /**
     * Api client method definition
     *
     * @var array
     */
    protected $methods = [
        'getCurrentUser' => ['get', 'members/me'],
        'getCurrentUserBoards' => ['get', 'members/my/boards'],
        'getCurrentUserPinnedBoards' => ['get', 'members/my/boards/pinned'],
        'getCurrentUserCards' => ['get', 'members/my/cards'],
        'getCurrentUserOrganizations' => ['get', 'members/my/organizations'],
        'deleteAction' => ['delete', 'actions/%s'],
        'getAction' => ['get', 'actions/%s'],
        'updateAction' => ['put', 'actions/%s'],
        'getActionField' => ['get', 'actions/%s/%s'],
        'getActionBoard' => ['get', 'actions/%s/board'],
        'getActionBoardField' => ['get', 'actions/%s/board/%s'],
        'getActionCard' => ['get', 'actions/%s/card'],
        'getActionCardField' => ['get', 'actions/%s/card/%s'],
        'getActionEntities' => ['get', 'actions/%s/entities'],
        'getActionList' => ['get', 'actions/%s/list'],
        'getActionListField' => ['get', 'actions/%s/list/%s'],
        'getActionMember' => ['get', 'actions/%s/member'],
        'getActionMemberField' => ['get', 'actions/%s/member/%s'],
        'getActionMemberCreator' => ['get', 'actions/%s/memberCreator'],
        'getActionMemberCreatorField' => ['get', 'actions/%s/memberCreator/%s'],
        'getActionOrganization' => ['get', 'actions/%s/organization'],
        'getActionOrganizationField' => ['get', 'actions/%s/organization/%s'],
        'updateActionText' => ['put', 'actions/%s/text'],
        'getAuthorize' => ['get', 'authorize'],
        'getBatch' => ['get', 'batch'],
        'addBoard' => ['post', 'boards'],
        'getBoard' => ['get', 'boards/%s'],
        'updateBoard' => ['put', 'boards/%s'],
        'getBoardField' => ['get', 'boards/%s/%s'],
        'getBoardActions' => ['get', 'boards/%s/actions'],
        'getBoardBoardStars' => ['get', 'boards/%s/boardStars'],
        'addBoardCalendarKeyGenerate' => ['post', 'boards/%s/calendarKey/generate'],
        'getBoardCards' => ['get', 'boards/%s/cards'],
        'getBoardCard' => ['get', 'boards/%s/cards/%s'],
        'getBoardCardsWithFilter' => ['get', 'boards/%s/cards/%s'],
        'getBoardChecklists' => ['get', 'boards/%s/checklists'],
        'addBoardChecklist' => ['post', 'boards/%s/checklists'],
        'updateBoardClosed' => ['put', 'boards/%s/closed'],
        'getBoardDeltas' => ['get', 'boards/%s/deltas'],
        'updateBoardDesc' => ['put', 'boards/%s/desc'],
        'addBoardEmailKeyGenerate' => ['post', 'boards/%s/emailKey/generate'],
        'updateBoardIdOrganization' => ['put', 'boards/%s/idOrganization'],
        'updateBoardLabelNameBlue' => ['put', 'boards/%s/labelNames/blue'],
        'updateBoardLabelNameGreen' => ['put', 'boards/%s/labelNames/green'],
        'updateBoardLabelNameOrange' => ['put', 'boards/%s/labelNames/orange'],
        'updateBoardLabelNamePurple' => ['put', 'boards/%s/labelNames/purple'],
        'updateBoardLabelNameRed' => ['put', 'boards/%s/labelNames/red'],
        'updateBoardLabelNameYellow' => ['put', 'boards/%s/labelNames/yellow'],
        'getBoardCustomFields' => ['get', 'boards/%s/customFields'],
        'getBoardLabels' => ['get', 'boards/%s/labels'],
        'addBoardLabel' => ['post', 'boards/%s/labels'],
        'getBoardLabel' => ['get', 'boards/%s/labels/%s'],
        'getBoardLists' => ['get', 'boards/%s/lists'],
        'addBoardList' => ['post', 'boards/%s/lists'],
        'getBoardList' => ['get', 'boards/%s/lists/%s'],
        'addBoardMarkAsViewed' => ['post', 'boards/%s/markAsViewed'],
        'getBoardMembers' => ['get', 'boards/%s/members'],
        'updateBoardMembers' => ['put', 'boards/%s/members'],
        'deleteBoardMember' => ['delete', 'boards/%s/members/%s'],
        'getBoardMember' => ['get', 'boards/%s/members/%s'],
        'updateBoardMember' => ['put', 'boards/%s/members/%s'],
        'getBoardMemberCards' => ['get', 'boards/%s/members/%s/cards'],
        'getBoardMemberships' => ['get', 'boards/%s/memberships'],
        'getBoardMembership' => ['get', 'boards/%s/memberships/%s'],
        'updateBoardMembership' => ['put', 'boards/%s/memberships/%s'],
        'getBoardMembersInviteds' => ['get', 'boards/%s/membersInvited'],
        'getBoardMembersInvited' => ['get', 'boards/%s/membersInvited/%s'],
        'getBoardMyPref' => ['get', 'boards/%s/myPrefs'],
        'updateBoardMyPrefEmailPosition' => ['put', 'boards/%s/myPrefs/emailPosition'],
        'updateBoardMyPrefIdEmailList' => ['put', 'boards/%s/myPrefs/idEmailList'],
        'updateBoardMyPrefShowListGuide' => ['put', 'boards/%s/myPrefs/showListGuide'],
        'updateBoardMyPrefShowSidebar' => ['put', 'boards/%s/myPrefs/showSidebar'],
        'updateBoardMyPrefShowSidebarActivity' => ['put', 'boards/%s/myPrefs/showSidebarActivity'],
        'updateBoardMyPrefShowSidebarBoardAction' => ['put', 'boards/%s/myPrefs/showSidebarBoardActions'],
        'updateBoardMyPrefShowSidebarMember' => ['put', 'boards/%s/myPrefs/showSidebarMembers'],
        'updateBoardName' => ['put', 'boards/%s/name'],
        'getBoardOrganization' => ['get', 'boards/%s/organization'],
        'getBoardOrganizationField' => ['get', 'boards/%s/organization/%s'],
        'addBoardPowerUp' => ['post', 'boards/%s/powerUps'],
        'deleteBoardPowerUp' => ['delete', 'boards/%s/powerUps/%s'],
        'updateBoardPrefBackground' => ['put', 'boards/%s/prefs/background'],
        'updateBoardPrefCalendarFeedEnabled' => ['put', 'boards/%s/prefs/calendarFeedEnabled'],
        'updateBoardPrefCardAging' => ['put', 'boards/%s/prefs/cardAging'],
        'updateBoardPrefCardCovers' => ['put', 'boards/%s/prefs/cardCovers'],
        'updateBoardPrefComment' => ['put', 'boards/%s/prefs/comments'],
        'updateBoardPrefInvitation' => ['put', 'boards/%s/prefs/invitations'],
        'updateBoardPrefPermissionLevel' => ['put', 'boards/%s/prefs/permissionLevel'],
        'updateBoardPrefSelfJoin' => ['put', 'boards/%s/prefs/selfJoin'],
        'updateBoardPrefVoting' => ['put', 'boards/%s/prefs/voting'],
        'updateBoardSubscribed' => ['put', 'boards/%s/subscribed'],
        'addCard' => ['post', 'cards'],
        'deleteCard' => ['delete', 'cards/%s'],
        'getCard' => ['get', 'cards/%s'],
        'updateCard' => ['put', 'cards/%s'],
        'getCardField' => ['get', 'cards/%s/%s'],
        'getCardAction' => ['get', 'cards/%s/actions'],
        'deleteCardActionComment' => ['delete', 'cards/%s/actions/%s/comments'],
        'updateCardActionComments' => ['put', 'cards/%s/actions/%s/comments'],
        'addCardActionComment' => ['post', 'cards/%s/actions/comments'],
        'getCardAttachments' => ['get', 'cards/%s/attachments'],
        'addCardAttachment' => ['post', 'cards/%s/attachments'],
        'deleteCardAttachment' => ['delete', 'cards/%s/attachments/%s'],
        'getCardAttachment' => ['get', 'cards/%s/attachments/%s'],
        'getCardBoard' => ['get', 'cards/%s/board'],
        'getCardBoardField' => ['get', 'cards/%s/board/%s'],
        'getCardCheckItemState' => ['get', 'cards/%s/checkItemStates'],
        'addCardChecklistCheckItem' => ['post', 'cards/%s/checklist/%s/checkItem'],
        'deleteCardChecklistCheckItem' => ['delete', 'cards/%s/checklist/%s/checkItem/%s'],
        'updateCardChecklistCheckItem' => ['put', 'cards/%s/checklist/%s/checkItem/%s'],
        'addCardChecklistCheckItemConvertToCard' => ['post', 'cards/%s/checklist/%s/checkItem/%s/convertToCard'],
        'updateCardChecklistCheckItemName' => ['put', 'cards/%s/checklist/%s/checkItem/%s/name'],
        'updateCardChecklistCheckItemPos' => ['put', 'cards/%s/checklist/%s/checkItem/%s/pos'],
        'updateCardChecklistCheckItemState' => ['put', 'cards/%s/checklist/%s/checkItem/%s/state'],
        'getCardChecklists' => ['get', 'cards/%s/checklists'],
        'addCardChecklist' => ['post', 'cards/%s/checklists'],
        'deleteCardChecklist' => ['delete', 'cards/%s/checklists/%s'],
        'updateCardClosed' => ['put', 'cards/%s/closed'],
        'updateCardDesc' => ['put', 'cards/%s/desc'],
        'updateCardDue' => ['put', 'cards/%s/due'],
        'updateCardIdAttachmentCover' => ['put', 'cards/%s/idAttachmentCover'],
        'updateCardIdBoard' => ['put', 'cards/%s/idBoard'],
        'addCardIdLabel' => ['post', 'cards/%s/idLabels'],
        'deleteCardIdLabel' => ['delete', 'cards/%s/idLabels/%s'],
        'updateCardIdList' => ['put', 'cards/%s/idList'],
        'addCardIdMember' => ['post', 'cards/%s/idMembers'],
        'updateCardIdMembers' => ['put', 'cards/%s/idMembers'],
        'deleteCardIdMember' => ['delete', 'cards/%s/idMembers/%s'],
        'addCardLabel' => ['post', 'cards/%s/labels'],
        'updateCardLabel' => ['put', 'cards/%s/labels'],
        'deleteCardLabel' => ['delete', 'cards/%s/labels/%s'],
        'getCardCustomField' => ['get', 'cards/%s/customField/%s'],
        'updateCardCustomField' => ['putAsBody', 'cards/%s/customField/%s/item'],
        'getCardList' => ['get', 'cards/%s/list'],
        'getCardListField' => ['get', 'cards/%s/list/%s'],
        'addCardMarkAssociatedNotificationsRead' => ['post', 'cards/%s/markAssociatedNotificationsRead'],
        'getCardMembers' => ['get', 'cards/%s/members'],
        'getCardMembersVoted' => ['get', 'cards/%s/membersVoted'],
        'addCardMembersVoted' => ['post', 'cards/%s/membersVoted'],
        'deleteCardMembersVoted' => ['delete', 'cards/%s/membersVoted/%s'],
        'updateCardName' => ['put', 'cards/%s/name'],
        'updateCardPos' => ['put', 'cards/%s/pos'],
        'getCardStickers' => ['get', 'cards/%s/stickers'],
        'addCardSticker' => ['post', 'cards/%s/stickers'],
        'deleteCardSticker' => ['delete', 'cards/%s/stickers/%s'],
        'getCardSticker' => ['get', 'cards/%s/stickers/%s'],
        'updateCardSticker' => ['put', 'cards/%s/stickers/%s'],
        'updateCardSubscribed' => ['put', 'cards/%s/subscribed'],
        'addChecklist' => ['post', 'checklists'],
        'deleteChecklist' => ['delete', 'checklists/%s'],
        'getChecklist' => ['get', 'checklists/%s'],
        'updateChecklist' => ['put', 'checklists/%s'],
        'getChecklistField' => ['get', 'checklists/%s/%s'],
        'getChecklistBoard' => ['get', 'checklists/%s/board'],
        'getChecklistBoardField' => ['get', 'checklists/%s/board/%s'],
        'getChecklistCards' => ['get', 'checklists/%s/cards'],
        'getChecklistCard' => ['get', 'checklists/%s/cards/%s'],
        'getChecklistCheckItems' => ['get', 'checklists/%s/checkItems'],
        'addChecklistCheckItem' => ['post', 'checklists/%s/checkItems'],
        'deleteChecklistCheckItem' => ['delete', 'checklists/%s/checkItems/%s'],
        'getChecklistCheckItem' => ['get', 'checklists/%s/checkItems/%s'],
        'updateChecklistIdCard' => ['put', 'checklists/%s/idCard'],
        'updateChecklistName' => ['put', 'checklists/%s/name'],
        'updateChecklistPos' => ['put', 'checklists/%s/pos'],
        'addCustomField' => ['post', 'customFields'],
        'addCustomFieldOption' => ['post', 'customField/%s/options'],
        'updateCustomFieldOption' => ['put', 'customField/%s/options/%s'],
        'deleteCustomField' => ['delete', 'customField/%s'],
        'addLabel' => ['post', 'labels'],
        'deleteLabel' => ['delete', 'labels/%s'],
        'getLabel' => ['get', 'labels/%s'],
        'updateLabel' => ['put', 'labels/%s'],
        'getLabelBoard' => ['get', 'labels/%s/board'],
        'getLabelBoardField' => ['get', 'labels/%s/board/%s'],
        'updateLabelColor' => ['put', 'labels/%s/color'],
        'updateLabelName' => ['put', 'labels/%s/name'],
        'addList' => ['post', 'lists'],
        'getList' => ['get', 'lists/%s'],
        'updateList' => ['put', 'lists/%s'],
        'getListField' => ['get', 'lists/%s/%s'],
        'getListActions' => ['get', 'lists/%s/actions'],
        'addListArchiveAllCards' => ['post', 'lists/%s/archiveAllCards'],
        'getListBoard' => ['get', 'lists/%s/board'],
        'getListBoardField' => ['get', 'lists/%s/board/%s'],
        'getListCards' => ['get', 'lists/%s/cards'],
        'addListCard' => ['post', 'lists/%s/cards'],
        'getListCard' => ['get', 'lists/%s/cards/%s'],
        'updateListClosed' => ['put', 'lists/%s/closed'],
        'updateListIdBoard' => ['put', 'lists/%s/idBoard'],
        'addListMoveAllCards' => ['post', 'lists/%s/moveAllCards'],
        'updateListName' => ['put', 'lists/%s/name'],
        'updateListPos' => ['put', 'lists/%s/pos'],
        'updateListSubscribed' => ['put', 'lists/%s/subscribed'],
        'getMember' => ['get', 'members/%s'],
        'updateMember' => ['put', 'members/%s'],
        'getMemberField' => ['get', 'members/%s/%s'],
        'getMemberActions' => ['get', 'members/%s/actions'],
        'addMemberAvatar' => ['post', 'members/%s/avatar'],
        'updateMemberAvatarSource' => ['put', 'members/%s/avatarSource'],
        'updateMemberBio' => ['put', 'members/%s/bio'],
        'getMemberBoardBackgrounds' => ['get', 'members/%s/boardBackgrounds'],
        'addMemberBoardBackground' => ['post', 'members/%s/boardBackgrounds'],
        'deleteMemberBoardBackground' => ['delete', 'members/%s/boardBackgrounds/%s'],
        'getMemberBoardBackground' => ['get', 'members/%s/boardBackgrounds/%s'],
        'updateMemberBoardBackground' => ['put', 'members/%s/boardBackgrounds/%s'],
        'getMemberBoards' => ['get', 'members/%s/boards'],
        'getMemberBoard' => ['get', 'members/%s/boards/%s'],
        'getMemberBoardsInvited' => ['get', 'members/%s/boardsInvited'],
        'getMemberBoardsInvitedField' => ['get', 'members/%s/boardsInvited/%s'],
        'getMemberBoardStars' => ['get', 'members/%s/boardStars'],
        'addMemberBoardStar' => ['post', 'members/%s/boardStars'],
        'deleteMemberBoardStar' => ['delete', 'members/%s/boardStars/%s'],
        'getMemberBoardStar' => ['get', 'members/%s/boardStars/%s'],
        'updateMemberBoardStar' => ['put', 'members/%s/boardStars/%s'],
        'updateMemberBoardStarIdBoard' => ['put', 'members/%s/boardStars/%s/idBoard'],
        'updateMemberBoardStarPos' => ['put', 'members/%s/boardStars/%s/pos'],
        'getMemberCards' => ['get', 'members/%s/cards'],
        'getMemberCard' => ['get', 'members/%s/cards/%s'],
        'getMemberCustomBoardBackgrounds' => ['get', 'members/%s/customBoardBackgrounds'],
        'addMemberCustomBoardBackground' => ['post', 'members/%s/customBoardBackgrounds'],
        'deleteMemberCustomBoardBackground' => ['delete', 'members/%s/customBoardBackgrounds/%s'],
        'getMemberCustomBoardBackground' => ['get', 'members/%s/customBoardBackgrounds/%s'],
        'updateMemberCustomBoardBackground' => ['put', 'members/%s/customBoardBackgrounds/%s'],
        'getMemberCustomEmojis' => ['get', 'members/%s/customEmoji'],
        'addMemberCustomEmoji' => ['post', 'members/%s/customEmoji'],
        'getMemberCustomEmoji' => ['get', 'members/%s/customEmoji/%s'],
        'getMemberCustomStickers' => ['get', 'members/%s/customStickers'],
        'addMemberCustomSticker' => ['post', 'members/%s/customStickers'],
        'deleteMemberCustomSticker' => ['delete', 'members/%s/customStickers/%s'],
        'getMemberCustomSticker' => ['get', 'members/%s/customStickers/%s'],
        'getMemberDeltas' => ['get', 'members/%s/deltas'],
        'updateMemberFullName' => ['put', 'members/%s/fullName'],
        'updateMemberInitials' => ['put', 'members/%s/initials'],
        'getMemberNotifications' => ['get', 'members/%s/notifications'],
        'getMemberNotification' => ['get', 'members/%s/notifications/%s'],
        'addMemberOneTimeMessagesDismissed' => ['post', 'members/%s/oneTimeMessagesDismissed'],
        'getMemberOrganizations' => ['get', 'members/%s/organizations'],
        'getMemberOrganization' => ['get', 'members/%s/organizations/%s'],
        'getMemberOrganizationsInvited' => ['get', 'members/%s/organizationsInvited'],
        'getMemberOrganizationsInvitedField' => ['get', 'members/%s/organizationsInvited/%s'],
        'updateMemberPrefColorBlind' => ['put', 'members/%s/prefs/colorBlind'],
        'updateMemberPrefMinutesBetweenSummaries' => ['put', 'members/%s/prefs/minutesBetweenSummaries'],
        'getMemberSavedSearches' => ['get', 'members/%s/savedSearches'],
        'addMemberSavedSearch' => ['post', 'members/%s/savedSearches'],
        'deleteMemberSavedSearch' => ['delete', 'members/%s/savedSearches/%s'],
        'getMemberSavedSearch' => ['get', 'members/%s/savedSearches/%s'],
        'updateMemberSavedSearch' => ['put', 'members/%s/savedSearches/%s'],
        'updateMemberSavedSearchName' => ['put', 'members/%s/savedSearches/%s/name'],
        'updateMemberSavedSearchPos' => ['put', 'members/%s/savedSearches/%s/pos'],
        'updateMemberSavedSearchQuery' => ['put', 'members/%s/savedSearches/%s/query'],
        'getMemberTokens' => ['get', 'members/%s/tokens'],
        'updateMemberUsername' => ['put', 'members/%s/username'],
        'getNotification' => ['get', 'notifications/%s'],
        'updateNotification' => ['put', 'notifications/%s'],
        'getNotificationField' => ['get', 'notifications/%s/%s'],
        'getNotificationBoard' => ['get', 'notifications/%s/board'],
        'getNotificationBoardField' => ['get', 'notifications/%s/board/%s'],
        'getNotificationCard' => ['get', 'notifications/%s/card'],
        'getNotificationCardField' => ['get', 'notifications/%s/card/%s'],
        'getNotificationEntities' => ['get', 'notifications/%s/entities'],
        'getNotificationList' => ['get', 'notifications/%s/list'],
        'getNotificationListField' => ['get', 'notifications/%s/list/%s'],
        'getNotificationMember' => ['get', 'notifications/%s/member'],
        'getNotificationMemberField' => ['get', 'notifications/%s/member/%s'],
        'getNotificationMemberCreator' => ['get', 'notifications/%s/memberCreator'],
        'getNotificationMemberCreatorField' => ['get', 'notifications/%s/memberCreator/%s'],
        'getNotificationOrganization' => ['get', 'notifications/%s/organization'],
        'getNotificationOrganizationField' => ['get', 'notifications/%s/organization/%s'],
        'updateNotificationUnread' => ['put', 'notifications/%s/unread'],
        'addNotificationAllRead' => ['post', 'notifications/all/read'],
        'addOrganization' => ['post', 'organizations'],
        'deleteOrganization' => ['delete', 'organizations/%s'],
        'getOrganization' => ['get', 'organizations/%s'],
        'updateOrganization' => ['put', 'organizations/%s'],
        'getOrganizationField' => ['get', 'organizations/%s/%s'],
        'getOrganizationActions' => ['get', 'organizations/%s/actions'],
        'getOrganizationBoards' => ['get', 'organizations/%s/boards'],
        'getOrganizationBoardsFilter' => ['get', 'organizations/%s/boards/%s'],
        'getOrganizationDeltas' => ['get', 'organizations/%s/deltas'],
        'updateOrganizationDesc' => ['put', 'organizations/%s/desc'],
        'updateOrganizationDisplayName' => ['put', 'organizations/%s/displayName'],
        'deleteOrganizationLogo' => ['delete', 'organizations/%s/logo'],
        'addOrganizationLogo' => ['post', 'organizations/%s/logo'],
        'getOrganizationMembers' => ['get', 'organizations/%s/members'],
        'updateOrganizationMembers' => ['put', 'organizations/%s/members'],
        'deleteOrganizationMember' => ['delete', 'organizations/%s/members/%s'],
        'getOrganizationMembersFilter' => ['get', 'organizations/%s/members/%s'],
        'updateOrganizationMember' => ['put', 'organizations/%s/members/%s'],
        'deleteOrganizationMemberAll' => ['delete', 'organizations/%s/members/%s/all'],
        'getOrganizationMemberCards' => ['get', 'organizations/%s/members/%s/cards'],
        'updateOrganizationMemberDeactivated' => ['put', 'organizations/%s/members/%s/deactivated'],
        'getOrganizationMemberships' => ['get', 'organizations/%s/memberships'],
        'getOrganizationMembership' => ['get', 'organizations/%s/memberships/%s'],
        'updateOrganizationMembership' => ['put', 'organizations/%s/memberships/%s'],
        'getOrganizationMembersInvited' => ['get', 'organizations/%s/membersInvited'],
        'getOrganizationMembersInvitedField' => ['get', 'organizations/%s/membersInvited/%s'],
        'updateOrganizationName' => ['put', 'organizations/%s/name'],
        'deleteOrganizationPrefAssociatedDomain' => ['delete', 'organizations/%s/prefs/associatedDomain'],
        'updateOrganizationPrefAssociatedDomain' => ['put', 'organizations/%s/prefs/associatedDomain'],
        'updateOrganizationPrefBoardVisibilityRestrictOrg' => [
            'put', 'organizations/%s/prefs/boardVisibilityRestrict/org',
        ],
        'updateOrganizationPrefBoardVisibilityRestrictPrivate' => [
            'put', 'organizations/%s/prefs/boardVisibilityRestrict/private',
        ],
        'updateOrganizationPrefBoardVisibilityRestrictPublic' => [
            'put', 'organizations/%s/prefs/boardVisibilityRestrict/public',
        ],
        'updateOrganizationPrefExternalMembersDisabled' => ['put', 'organizations/%s/prefs/externalMembersDisabled'],
        'updateOrganizationPrefGoogleAppsVersion' => ['put', 'organizations/%s/prefs/googleAppsVersion'],
        'deleteOrganizationPrefOrgInviteRestrict' => ['delete', 'organizations/%s/prefs/orgInviteRestrict'],
        'updateOrganizationPrefOrgInviteRestrict' => ['put', 'organizations/%s/prefs/orgInviteRestrict'],
        'updateOrganizationPrefPermissionLevel' => ['put', 'organizations/%s/prefs/permissionLevel'],
        'updateOrganizationWebsite' => ['put', 'organizations/%s/website'],
        'getSearch' => ['get', 'search'],
        'getSearchMembers' => ['get', 'search/members'],
        'addSession' => ['post', 'sessions'],
        'updateSession' => ['put', 'sessions/%s'],
        'updateSessionStatus' => ['put', 'sessions/%s/status'],
        'getSessionSocket' => ['get', 'sessions/socket'],
        'deleteToken' => ['delete', 'tokens/%s'],
        'getToken' => ['get', 'tokens/%s'],
        'getTokenField' => ['get', 'tokens/%s/%s'],
        'getTokenMember' => ['get', 'tokens/%s/member'],
        'getTokenMemberField' => ['get', 'tokens/%s/member/%s'],
        'getTokenWebhooks' => ['get', 'tokens/%s/webhooks'],
        'addTokenWebhook' => ['post', 'tokens/%s/webhooks'],
        'updateTokenWebhooks' => ['put', 'tokens/%s/webhooks'],
        'deleteTokenWebhook' => ['delete', 'tokens/%s/webhooks/%s'],
        'getTokenWebhook' => ['get', 'tokens/%s/webhooks/%s'],
        'getType' => ['get', 'types/%s'],
        'addWebhook' => ['post', 'webhooks'],
        'deleteWebhook' => ['delete', 'webhooks/%s'],
        'getWebhook' => ['get', 'webhooks/%s'],
        'updateWebhook' => ['put', 'webhooks/%s'],
        'getWebhookField' => ['get', 'webhooks/%s/%s'],
        'updateWebhookActive' => ['put', 'webhooks/%s/active'],
        'updateWebhookCallbackURL' => ['put', 'webhooks/%s/callbackURL'],
        'updateWebhookDescription' => ['put', 'webhooks/%s/description'],
        'updateWebhookIdModel' => ['put', 'webhooks/%s/idModel'],
    ];

    /**
     * Retrieves currently configured http broker.
     *
     * @return vasyaxy\Services\Trello\Http
     * @codeCoverageIgnore
     */
    abstract public function getHttp();

    /**
     * Attempts to handle api method call.
     *
     * @param  string  $method
     * @param  array   $parameters
     *
     * @return object
     * @throws BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        if ($signature = $this->getMethodSignature($method)) {
            preg_match_all('/\%/', $signature[1], $replacements);

            $replacementCount = isset($replacements[0]) ? count($replacements[0]) : 0;

            $replacementParams = array_splice($parameters, 0, $replacementCount);

            array_unshift($replacementParams, $signature[1]);

            $path = call_user_func_array('sprintf', $replacementParams);

            array_unshift($parameters, $path);

            return call_user_func_array([$this->getHttp(), $signature[0]], $parameters);
        }

        throw new BadMethodCallException("Method ".$method." not found on ".get_class().".", 500);
    }

    /**
     * Attempts to retrieve method signature from method definition.
     *
     * @param  string  $method
     *
     * @return array|null
     */
    private function getMethodSignature($method)
    {
        $validMethod = isset($this->methods[$method])
            && is_array($this->methods[$method])
            && count($this->methods[$method]) >= 2;

        if ($validMethod) {
            return $this->methods[$method];
        }

        return null;
    }
}
