<template>
    <div class="instagram-gallery">
        <div class="gallery-inner column-3 overflow-hidden">
            <a v-for="item in items" :href="item.link || '#'" class="single-gallery-items" target="_blank">
                <img :src="item.thumbnail" :alt="item.caption">
            </a>
        </div>
    </div>
</template>

<script>
    import { getInstagram } from '../_api';

    export default {
        props: {
          username: {
            type: String,
            default: ''
          },
          limit: {
            type: Number,
            default: () => 6
          }
        },
        data() {
            return {
                items: []
            };
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                const res = await getInstagram(this.username, this.limit);

                // console.log('Res: ', res);

                if (res.status) {
                    this.items = res.payload;
                }
            }
        }
    }
</script>
