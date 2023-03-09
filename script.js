function download() {
    const element = document.getElementById("resume-main");
    var opt = {
        margin:1,
        filename: "resume.pdf",
        html2canvas:{
            scale:10,
        }
    }

    html2pdf().from(element).set(opt).save();
    
}