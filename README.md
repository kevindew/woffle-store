# Local Storage Web Fonts

Prompted by a talk from Andy Hume from the Guardian about their techniques for local storage web fonts I bashed up this very quick proof of concept to see it working.

## Current Issues
- Don't know why in demo in <em>foo <strong>bar</strong></em> is not a bold italic bar?
- Unsure if it's safe to use the direct urls of the google font files (do they change?)
- Not sure how to detect WOFF support, currently showing fonts as active when WOFF injected on browsers even when not working? - Is it possible to detect whether a font is available?
- Only supporting WOFF, can probably support TTF too, but that only benefits Android? Not sure about EOT too, not sure if worth it.
- Has a modernizr dependency
- Syntax could be easier - ballache finding WOFF direct file urls from Google
- Iffy on the security of the PHP script
- Doesn't cache server side

## Future ideas for it 
- Handle local font files safely
- Mirror or utilise aspects of Google Web Font Loader syntax for super easy drop in
- Take stylesheets passed to back end script rather than just font file and return accordingly
-- We'd maybe have to send a request from the PHP script pretending to be the users browser as Google (and maybe others) return fonts based on that
-- Server side the CSS file would have to be parsed somewhat, which could be ugly or dirty, to extract file urls. Not sure what to do in case of multiple ones. 
-- Not sure if we can insert multiple rules in one go via insertRule so if CSS is returned to be injected that'd have to be parsed to separate rules.
- It could be that each font is inserted via JSONP 
-- but I wonder if with that we'd know if something failed?
