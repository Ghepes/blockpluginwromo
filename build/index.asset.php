<?php return array('dependencies' => array('wp-block-editor', 'wp-blocks', 'wp-element', 'wp-i18n', 'wp-polyfill'), 'version' => '222589037bfacb2f8ad6da44cbfd8f5d05c2d1f2');

// Path: build\index.js
/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';

registerBlockType('blockpluginwromo/blockpluginwromo', {
    title: __('blockpluginwromo', 'blockpluginwromo'),
    icon: 'smiley',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    edit({ attributes, setAttributes }) {
        return (
            <RichText
                tagName="p"
                onChange={(content) => setAttributes({ content })}
                value={attributes.content}
            />
        );
    },
    save({ attributes }) {
        return <RichText.Content tagName="p" value={attributes.content} />;
    },
});

// Path: build\style.css
.wp-block-my-plugin-my-block {
	color: #f00;
}

// Path: build\view.css
.wp-block-my-plugin-my-block {
	color: #00f;
}

// Path: build\view.js
/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

registerBlockType('blockpluginwromo/blockpluginwromo', {
    title: __('blockpluginwromo', 'blockpluginwromo'),
    icon: 'smiley',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },
    },
    save({ attributes }) {
        return <p>{attributes.content}</p>;
    },
});

// Path: build\view.php
<?php
/**
 * Server-side rendering of the `my-plugin/my-block` block.
 *
 * @package WordPress
 */

/**
 * Renders the `my-plugin/my-block` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with the latest posts added.
 */
function render_block_blockpluginwromo_blockpluginwromo($attributes) {
    return 'blockpluginwromo' . $attributes['content'] . 'blockpluginwromo';
}

/**
 * Registers the `my-plugin/my-block` block on server.
 */
function register_block_blockpluginwromo_blockpluginwromo() {
    register_block_type('blockpluginwromo/blockpluginwromo', array(
        'render_callback' => 'render_block_blockpluginwromo_blockpluginwromo',
    ));

