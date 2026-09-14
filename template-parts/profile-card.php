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

$twitter_url = get_the_author_meta( 'twitter', $user_id );
$facebook_url = get_the_author_meta( 'facebook', $user_id );
$instagram_url = get_the_author_meta( 'instagram', $user_id );
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

    <div class="profile-card__socials">
      <?php if ( $twitter_url ) : ?>
        <a
          href="<?php echo esc_url( $twitter_url ); ?>"
          class="profile-card__social profile-card__social--twitter"
          target="_blank"
          rel="noopener noreferrer"
          aria-label="X"
        >
          X
        </a>
      <?php endif; ?>

      <?php if ( $facebook_url ) : ?>
        <a
          href="<?php echo esc_url( $facebook_url ); ?>"
          class="profile-card__social profile-card__social--facebook"
          target="_blank"
          rel="noopener noreferrer"
          aria-label="Facebook"
        >
          f
        </a>
      <?php endif; ?>

      <?php if ( $instagram_url ) : ?>
        <a
          href="<?php echo esc_url( $instagram_url ); ?>"
          class="profile-card__social profile-card__social--instagram"
          target="_blank"
          rel="noopener noreferrer"
          aria-label="Instagram"
        >
          ◎
        </a>
      <?php endif; ?>

      <a
        href="<?php echo esc_url( get_feed_link() ); ?>"
        class="profile-card__social profile-card__social--rss"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="RSS"
      >
        RSS
      </a>
    </div>
  </div>
</div>