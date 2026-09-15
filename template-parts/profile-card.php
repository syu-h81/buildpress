<?php
/**
 * Profile Card
 *
 * @package Syublog_Org_Theme
 */

$user_id = 1;

$display_name = get_the_author_meta( 'display_name', $user_id );
$description = get_the_author_meta( 'description', $user_id );
$avatar_url = get_avatar_url( $user_id, array(
  'size' => 160,
) );

$profile_page = get_page_by_path( 'profile' );

if ( $profile_page ) {
  $profile_url = get_permalink( $profile_page->ID );
} else {
  $profile_url = home_url( '/profile/' );
}
?>

<div class="profile-card">
  <div class="profile-card__cover">
    <img
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile-cover.png' ); ?>"
      alt=""
      class="profile-card__cover-img"
    >
  </div>

  <div class="profile-card__body">
    <div class="profile-card__avatar">
      <img
        src="<?php echo esc_url( $avatar_url ); ?>"
        alt="<?php echo esc_attr( $display_name ); ?>"
      >
    </div>

    <h2 class="profile-card__name">
      <?php echo esc_html( $display_name ); ?>
    </h2>

    <?php if ( $description ) : ?>
      <p class="profile-card__description">
        <?php echo nl2br( esc_html( $description ) ); ?>
      </p>
    <?php endif; ?>

    <div class="pt-3">
      <a class="profile-card__link" href="<?php echo esc_url( $profile_url ); ?>">
        プロフィール詳細へ
      </a>
    </div>
  </div>
</div>