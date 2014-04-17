(function () {
    CKEDITOR.dialog.add('youtube',
	function (editor) {
	    return { title: editor.lang.youtube.title, minWidth: CKEDITOR.env.ie && CKEDITOR.env.quirks ? 368 : 350, minHeight: 240,
	        onShow: function () { this.getContentElement('general', 'content').getInputElement().setValue('') },
	        onOk: function () {
	            val = this.getContentElement('general', 'content').getInputElement().getValue();
	            if ( val.search("&feature=player_embedded") > 0 || val.search("feature=g-logo-xit&") > 0 || val.search("&feature=g-logo-xit") > 0 || val.search(" ") > 0 || val.search("&feature=g-trend") > 0 || val.search("&feature=related") > 0 || val.search("&feature=context-gflo") > 0 || val.search("feature=fvwp&") > 0 || val.search("&NR=1") > 0) {
	                val = val.replace("&feature=g-trend", "");
	                val = val.replace("&feature=g-logo-xit", "");
	                val = val.replace("&feature=related", "");
	                val = val.replace("&feature=context-gflo", "");
	                val = val.replace("feature=fvwp&", "");
	                val = val.replace("&NR=1", "");
	                val = val.replace(" ", "");
	                val = val.replace("&feature=player_embedded", "");
	            }
	            if (val.indexOf("youtu.be", 0) > -1) { val = val.replace("youtu.be", "youtube.com/embed"); }
	            else { val = val.replace("watch\?v\=", "embed\/"); }
	            var text = '<iframe title="YouTube Player" class="youtube-player" type="text/html" width="480" height="390" src="'
	            //+this.getContentElement('general','content').getInputElement().getValue()
                + val + '?rel=0" frameborder="0"></iframe>';
	            this.getParentEditor().insertHtml(text)
	        },
	        contents: [{ label: editor.lang.common.generalTab, id: 'general', elements:
																		[{ type: 'html', id: 'pasteMsg', html: '<div style="white-space:normal;width:500px;"><img style="margin:5px auto;" src="'
																		+ CKEDITOR.getUrl(CKEDITOR.plugins.getPath('youtube')
																		+ 'images/youtube_large.png')
																		+ '"><br />' + editor.lang.youtube.pasteMsg
																		+ '</div>'
																		}, { type: 'html', id: 'content', style: 'width:340px;height:90px', html: '<input size="100" style="' + 'border:1px solid black;' + 'background:white">', focus: function () { this.getElement().focus() } }]
	        }]
	    }
	})
})();
