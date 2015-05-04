<?php

function meta_box_post_link_externo_add() {
    add_meta_box(
        "meta_box_link_externo_id",
        "Link Externo",
        "meta_box_post_link_externo",
        "post",
        "normal",
        "high"
    );
}

function meta_box_post_link_externo() {
    $fields   = get_post_custom($post -> ID);
    $content = isset($fields["link-externo"]) ? esc_attr($fields["link-externo"][0]) : "";

    wp_nonce_field("my_meta_box_nonce", "meta_box_nonce");

    echo "
        <p>
            <label for='link-externo'>URL: </label><br>
            <input type='text' style='width:100%;' name='link-externo' id='link-externo' value='$content'>
        </p>
    ";
}

function meta_box_post_link_externo_save($post_id) {
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST["meta_box_nonce"]) || !wp_verify_nonce($_POST["meta_box_nonce"], "my_meta_box_nonce")) {
        return;
    }

    if (!current_user_can("edit_post")) {
        return;
    }

    if (isset($_POST["link-externo"])) {
        update_post_meta(
            $post_id,
            "link-externo",
            $_POST["link-externo"]
        );
    }
}

add_action("add_meta_boxes", "meta_box_post_link_externo_add");
add_action("save_post", "meta_box_post_link_externo_save");
?>
