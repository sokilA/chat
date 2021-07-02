<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <textarea class="form-control" rows="10" readonly>{{ messages.join('\n') }}</textarea>
                <hr>
                <input v-model="textMessage" type="text" class="form-control" @keyup.enter="sendMessage">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
    	return {
    		messages: [],
            textMessage: ''
        }
    },
    mounted () {
        window.Echo.channel('chat')
    },
	methods: {
		sendMessage() {
			axios.post('/messages', {message: this.textMessage});

			this.messages.push(this.textMessage);
			this.textMessage = '';
        }
    }
}
</script>