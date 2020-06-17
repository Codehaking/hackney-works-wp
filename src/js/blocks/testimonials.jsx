const { registerBlockType } = window.wp.blocks
const { RichText, InnerBlocks } = window.wp.blockEditor

const icon = 
    <svg width="199" height="101" viewBox="0 0 199 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="71" width="128" height="20" rx="8" fill="#212121"/>
        <rect x="71" y="32" width="64" height="20" rx="8" fill="#212121"/>
        <circle cx="25" cy="27" r="25" fill="#212121"/>
        <circle cx="68.8513" cy="90.4998" r="9.85135" fill="#212121"/>
        <circle cx="99.4999" cy="90.4998" r="9.85135" fill="#212121"/>
        <circle cx="130.149" cy="90.4998" r="9.85135" fill="#212121"/>
    </svg>

registerBlockType( 'lbh/testimonials', {
    title: "Testimonials slider",
    icon: icon,
    category: "hackney",
    attributes: {
        title: {
            type: "string",
            source: "text",
            selector: "h2"
        }
    },

    edit: ({ attributes: { title }, setAttributes, className }) => 
        <div className={className}>
            <RichText
                value={title}
                placeholder="Headline..."
                tagName="h2"
                allowedFormats={[]}
                onChange={value => setAttributes({title: value})} 
            />
            <InnerBlocks allowedBlocks={['lbh/testimonial']} />
        </div>
    ,

    save: ({ attributes: { title }, className }) => 
        <div id="testimonials" className="full-width hero">
            <div class="bg_img">
                <img class="parralax_me" id="parralax_me2" src="/wp-content/themes/hackney-works-wp/assets/canal.jpg" alt="Canal"/>
            </div>
            <div class="container">
                <h2>{title}</h2>
                <div class="slider">
                    <InnerBlocks.Content />
                </div>
            </div>
        </div>
    ,
})