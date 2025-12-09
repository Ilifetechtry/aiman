    <script type="text/javascript">
        $(document).ready(function() {
            $("#exb").click(function() {
                const element = document.querySelector("#maintable");

                html2canvas(element, {
                    scale: 2,
                    useCORS: true
                }).then(canvas => {
                    const imgData = canvas.toDataURL("image/png");
                    const {
                        jsPDF
                    } = window.jspdf;
                    const pdf = new jsPDF("p", "px", "a4");

                    const pageWidth = pdf.internal.pageSize.getWidth();
                    const pageHeight = pdf.internal.pageSize.getHeight();

                    const imgWidth = pageWidth - 20;
                    const imgHeight = (canvas.height * imgWidth) / canvas.width;

                    pdf.addImage(imgData, "PNG", 10, 10, imgWidth, imgHeight);

                    // // Get cname input value and sanitize it
                    // let cname = document.getElementById("cname").value.trim() || "invoice";
                    // cname = cname.replace(/[^a-z0-9]/gi, '_').toLowerCase();

                    // // Format date: dd-mm-yyyy
                    // const today = new Date();
                    // const dateStr = today.toLocaleDateString('en-GB').replace(/\//g, '-');

                    // Save the PDF
                    pdf.save(`Doc.pdf`);
                });
            });
        });
    </script>

    <!-- <script type="text/javascript">
       $(document).ready(function () {
            $("#exb").click(function () {
                html2canvas(document.querySelector("#maintable")).then(canvas => {
                    let imgData = canvas.toDataURL("image/png");
                    const { jsPDF } = window.jspdf;
                    let pdf = new jsPDF("p", "px", "a4");

                    let imgWidth = 425; // Fit within A4 width
                    // let imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let imgHeight = 620;

                    pdf.addImage(imgData, "PNG", 10, 0, imgWidth, imgHeight);
                    // pdf.save("document.pdf"); // Download the PDF
                    let cname = document.getElementById("cname").value || "Invoice";
                    cname = cname.replace(/[^a-z0-9]/gi, '_').toLowerCase();
                    let dateStr = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');
                    pdf.save(`${cname}-${dateStr}.pdf`);
                });
            });
        });
    </script> -->

    <script>
        var a = ['', 'One ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
        var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

        function inWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
            return str;
        }

        document.getElementById('words').innerHTML = inWords(document.getElementById('number').value);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>