<?php
/**
 * theme file : /theme/THEME_NAME/head.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style.css?ver='.G5_CSS_VER.'">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/custom.css?ver='.G5_CSS_VER.'">',0);

/**
 * 로고 타입 : 'image' || 'text'
 */
$logo = 'image';

/**
 * 메뉴바 전체 메뉴 출력 : 'yes' || 'no'
 */
$is_megamenu = 'yes';
?>

<?php if (!$wmode) { ?>
<?php /*----- wrapper 시작 -----*/ ?>
<div class="wrapper">
    <h1 id="hd-h1"><?php echo $g5['title'] ?></h1>
    <div class="to-content"><a href="#container">본문 바로가기</a></div>
    <?php
    // 팝업창
    if (defined('_INDEX_') && $newwin_contents) { // index에서만 실행
        echo $newwin_contents;
    }
    ?>

    <?php /*----- header 시작 -----*/ ?>
    <header class="header-wrap <?php if(!defined('_INDEX_')) { ?>page-header-wrap<?php } ?>">
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header-title">
                            <div class="container">
                                <?php /* ===== 사이트 로고 시작 ===== */ ?>
                                <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                                <div class="adm-edit-btn btn-edit-mode" style="top:0;left:12px;text-align:left">
                                    <div class="btn-group">
                                        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 로고 설정</a>
                                        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>" target="_blank" class="ae-btn-r" title="새창 열기">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                                <a href="<?php echo G5_URL; ?>" class="title-logo">
                                <?php if ($logo == 'text') { ?>
                                    <h1><?php echo $config['cf_title']; ?></h1>
                                <?php } else if ($logo == 'image') { ?>
                                    <?php if (!G5_IS_MOBILE) { ?>
                                    <?php if (file_exists($top_logo) && !is_dir($top_logo)) { ?>
                                    <img src="<?php echo $logo_src['top']; ?>" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                                    <?php } else { ?>
                                    <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.svg" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                                    <?php } ?>
                                    <?php } else { ?>
                                    <?php if (file_exists($top_mobile_logo) && !is_dir($top_mobile_logo)) { ?>
                                    <img src="<?php echo $logo_src['mobile_top']; ?>" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                                    <?php } else { ?>
                                    <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.svg" class="site-logo" alt="<?php echo $config['cf_title']; ?>">
                                    <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                </a>
                                <?php /* ===== 사이트 로고 끝 ===== */ ?>

                                <div class="header-title-mobile-btn">
                                    <button type="button" class="navbar-toggler search-toggle mobile-search-btn">
                                        <span class="sr-only">검색 버튼</span>
                                        <span class="fas fa-search"></span>
                                    </button>
                                    <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
                                        <span class="sr-only">메뉴 버튼</span>
                                        <span class="fas fa-bars"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 clearfix">
                        <ul class="top-header-nav list-unstyled thn-end">
                            <?php if ($is_member) {  ?>
                                <?php if ($is_admin) {  ?>
                            <li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                                <?php }  ?>
                            <li><a href="<?php echo G5_URL; ?>/mypage/">마이페이지 </a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                            <?php } else {  ?>
                            <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                            <?php }  ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">추가메뉴</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="<?php echo G5_BBS_URL ?>/new.php">새글</a>
                                    <a href="<?php echo G5_BBS_URL ?>/best.php">인기게시물</a>
                                    <a href="<?php echo G5_BBS_URL ?>/faq.php">자주묻는 질문</a>
                                    <a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a>
                                    <?php if ($is_member) { // 회원일 경우 ?>
                                    <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">회원정보수정</a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="search">
                                <div class="top-header-nav-search d-none d-lg-block">
                                    <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL; ?>/search.php" onsubmit="return fsearchbox_submit(this);" class="eyoom-form">
                                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                                        <input type="hidden" name="sop" value="and">
                                        <label for="modal_sch_stx" class="sound_only"><strong>검색어 입력 필수</strong></label>
                                        <div class="input input-button">
                                            <input type="text" name="stx" id="modal_sch_stx" class="sch_stx" maxlength="20" placeholder="전체 게시판 검색">
                                            <div class="button"><input type="submit"><i class="fas fa-search"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="container">
                    <ul class="top-header-nav list-unstyled thn-end">
                        <?php if ($is_member) {  ?>
                            <?php if ($is_admin) {  ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">카테고리</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="<?php echo G5_BBS_URL ?>/new.php">새글</a>
                                <a href="<?php echo G5_BBS_URL ?>/best.php">인기게시물</a>
                                <a href="<?php echo G5_BBS_URL ?>/faq.php">자주묻는 질문</a>
                                <a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a>
                                 <a href="<?php echo G5_BBS_URL ?>/new.php">새글</a>
                                <?php if ($is_member) { // 회원일 경우 ?>
                                <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">회원정보수정</a>
                                <?php } ?>
                            </div>
                        </li>
                            <?php }  ?>
                        <li><a href="<?php echo G5_URL; ?>/#">P2U링크 </a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/#">카테고리</a></li>
                        <li><a href="<?php echo G5_URL; ?>/#">카테고리 </a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/#">카테고리</a></li>
                        <li><a href="<?php echo G5_URL; ?>/#">카테고리 </a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/#">카테고리</a></li>
                        <?php } else {  ?>
                        <li><a href="<?php echo G5_BBS_URL ?>/#">카테고리</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/#">카테고리</a></li>
                        <?php }  ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    
        
    </header>
    <?php /*----- header 끝 -----*/ ?>

    <?php if(!defined('_INDEX_')) { // 메인이 아닐때 ?>
    <?php /*----- page title 시작 -----*/ ?>
    <div class="page-title-wrap">
        <div class="container">
        <?php if (!defined('_EYOOM_MYPAGE_')) { ?>
            <h2>
                <?php if (!$it_id) { ?>
                <i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?>
                <?php } else { ?>
                <span class="f-s-14r"><i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?></span>
                <?php } ?>
            </h2>
            <?php if (!$it_id) { ?>
            <div class="sub-breadcrumb-wrap">
                <ul class="sub-breadcrumb hidden-xs">
                    <?php echo $subinfo['path']; ?>
                </ul>
            </div>
            <?php } ?>
        <?php } else { ?>
            <h2><i class="fas fa-arrow-alt-circle-right"></i> 마이페이지</h2>
        <?php } ?>
        </div>
    </div>
    <?php /*----- page title 끝 -----*/ ?>
    <?php } ?>

    <div class="basic-body <?php if(!defined('_INDEX_')) { ?>page-body<?php } ?>">
        <?php if(defined('_INDEX_')) { ?>
        <div class="main-slider-top">
            <?php /* EB슬라이더 - basic */ ?>
            <?php echo eb_slider('1516512257'); ?>
        </div>
        <?php } ?>
        <div class="container">
            <?php if ($side_layout['use'] == 'yes') { ?>
            <div class="main-wrap">
                <?php
                if ($side_layout['pos'] == 'left') {
                    /* 사이드영역 시작 */
                    include_once(EYOOM_THEME_PATH . '/side.html.php');
                    /* 사이드영역 끝 */
                }
                ?>
                <main class="basic-body-main <?php if ($side_layout['pos'] == 'left') { echo 'right'; } else { echo 'left'; }?>-main">
            <?php } else { ?>
            <div class="main-wrap">
                <main class="basic-body-main">
            <?php } ?>
<?php } // !$wmode ?>