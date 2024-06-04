window.onload = function() {

    document.getElementById('custom_logo').addEventListener('change', (e) => {
        const files = e.target.files;
        const fileName = files[0].name;
        document.getElementById('custom_logo_name').innerHTML = fileName
        console.log("file name: ", fileName);
    })
}


// const getFileName = (event) => {
//
// }
