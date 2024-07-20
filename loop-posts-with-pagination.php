<?php
// Define pagination parameters
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'paged'          => $paged,
);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();

        // Get post title
        $post_title = get_the_title();

        // Get post URL
        $post_url = get_permalink();

        // Get post date
        $post_date = get_the_date();

        // Get post featured image URL
        $post_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); // Change 'full' to thumbnail size you want

        // Output HTML for each post
        ?>
        <div class="post">
            <h2><a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a></h2>
            <p>Published on <?php echo esc_html( $post_date ); ?></p>
            <?php if ( $post_image_url ) : ?>
                <img src="<?php echo esc_url( $post_image_url ); ?>" alt="<?php echo esc_attr( $post_title ); ?>">
            <?php endif; ?>
        </div>
        <?php
    }

    // Pagination
    the_posts_pagination( array(
        'prev_text' => __( '« Previous', 'textdomain' ),
        'next_text' => __( 'Next »', 'textdomain' ),
    ) );

} else {
    // no posts found
    echo 'No posts found.';
}
?>
