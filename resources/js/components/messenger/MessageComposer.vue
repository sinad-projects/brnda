<template>
    <div class="composer">
        <textarea class="text-right" v-model="message" @keydown.enter="send" placeholder="اكتب الرسالة هنا" ></textarea>
        <button type="submit" @click="send" class="btn custom-bg w3-right w3-margin-right">ارسال</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();

                if (this.message == '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style lang="scss" scoped>
.composer textarea {
    width: 96%;
    margin: 10px;
    resize: none;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding: 6px;
}
</style>
