panel.plugin("woo/localvideo", {
  blocks: {
    localvideo: {
      computed: {
        video() {
          return this.content.vidfile.length === 0 ? false : this.content.vidfile[0].url;
        }
      },
      template: `
        <div @click="open">          
          <video v-if="video" autoplay muted loop>
            <source :src="video" type="video/mp4">
            <p>Your Browser does not support video<p>
          </video>
          <div v-else>No video selected yet</div>
        <div> 
      `
    }
  }
});