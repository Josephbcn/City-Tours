<style>
  .flexMain {
    display:flex;
    align-items: center
  }
  .flex1 { flex:1 }
  .flex2 { flex:2 }
  .flex3 { flex:3 }
  
  button.siteLink {
    margin-left:-5px;
    border:none;
    padding:24px;
    display:inline-block;
    min-width:115px;
  }
  .whiteLink {
    background : #fff;
  }
  .whiteLink:active {
    background : #000;
    color: #fff;
  }
  .blackLink {
    color: #fff;
    background:#232323;
    transition: all 300ms linear;
  }
  
  .blackLink:active {
    color: #000;
    background:#fff
  }
  #siteBrand {
    font-family: impact;
    letter-spacing : -1px;
    font-size:32px;
    color:#252525;
    line-height : 1em;
  }
  #menuDrawer {
    background:#fff;
    position:fixed;
    height:100vh;
    overflow:auto;
    z-index:12312;
    top:0;
    left:0;
    border-right:1px solid #eaeaea;
    min-width:25%;
    max-width:320px;
    width:100%;
    transform : translateX(-100%);
    transition : transform 200ms linear;
  }
  #mainNavigation {
    transition : transform 200ms linear;
    background : #fff;
  }
  .drawMenu > #menuDrawer {
    transform : translateX(0%);
  }
  .drawMenu > #mainNavigation {
    transform : translateX(25%);
  }
  .fa-times {
    cursor : pointer
  }
  a.nav-menu-item:hover {
    margin-left:2px;
    border-left:10px solid black;
  }
  a.nav-menu-item{
    transition:border 200ms linear;
    text-decoration:none;
    display:block;
    padding:18px;
    padding-left:32px;
    border-bottom:1px solid #eaeaea;
    font-weight:bold;
    color:#343434
  }
  select.noStyle {
    border:none;
    outline:none
  }
</style>