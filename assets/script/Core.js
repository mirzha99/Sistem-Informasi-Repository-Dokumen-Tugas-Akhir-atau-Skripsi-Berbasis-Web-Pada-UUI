class Core {
    //url
    url(segment = null){
        var urls = window.location.href;
        var split = urls.split('/');
        var url = split[0]+'//'+split[2]+'/'+split[3]+'/';
        if(segment){
            return url+segment;
        }else{
            return url;
        }
    }
    //Modal
    Modal(label,url,button,color){
        $('#Labels').html(label);
        $('#Labels_del').html(label);
        $('.modal-body form').attr('action',this.url(url));
        $('.modal-footer button[type=sumbit]').html(button);
        $('.modal-footer button[type=sumbit]').attr('class',color);
    }
}