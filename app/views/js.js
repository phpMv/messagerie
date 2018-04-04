/**
 * 
 */
$("#changes")
		.html(
				Diff2Html
						.getPrettyHtml('diff --git a/app/views/Admin/main/vFooter.html b/app/views/Admin/main/vFooter.html\nindex a96587a..2e047cb 100644\n--- a/app/views/Admin/main/vFooter.html\n+++ b/app/views/Admin/main/vFooter.html\n@@ -2,5 +2,6 @@\n {% block scripts %}\n 	{{ parent() }}\n 	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>\n+	<script src="https://cdnjs.cloudflare.com/ajax/libs/diff2html/2.3.3/diff2html.min.js"></script>\n 	{{ js | raw }}\n {% endblock %}\n\ No newline at end of file'),
				{
					inputFormat : "diff",
					showFiles : true,
					matching : "lines"
				});