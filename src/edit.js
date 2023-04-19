/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, PanelRow, TextControl } from '@wordpress/components';
import { RichText, InnerBlocks } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();
	const { title } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Wromo settings', 'blockpluginwromo' ) }>
					<PanelRow>
						<TextControl
							label={ __( 'Title', 'blockpluginwromo' ) }
							value={ title }
							onChange={ ( value ) => setAttributes( { title: value } ) }
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<RichText
					tagName="h2"
					className="title"
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					placeholder={ __( 'Title', 'blockpluginwromo' ) }
				/>
				<InnerBlocks
					allowedBlocks={ [ 'core/paragraph' ] }
					template={ [
						[ 'core/paragraph', { placeholder: 'Add description' } ],
					] }
				/>
			</div>
		</>
	);
}

// Path: src\save.js
/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { RichText, InnerBlocks } from '@wordpress/block-editor';

export default function Save( { attributes } ) {
	const blockProps = useBlockProps.save();
	const { title } = attributes;

	return (
		<div { ...blockProps }>
			<RichText.Content
				tagName="h2"
				className="title"
				value={ title }
			/>
			<InnerBlocks.Content />
		</div>
	);
}

// Path: src\index.js
/**
 * Internal dependencies
 */
import edit from './edit';
import save from './save';

