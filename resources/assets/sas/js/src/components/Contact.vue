<template>
    <div v-if="!loading" class="contact" id="contact">
        <div class="container">
            <h2 class="main-header">Contact Us</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div v-html="contactData.phone_numbers" class="phone-numbers">
                        <h2 class="subheader2">PHONE</h2>
                        {{ contactData.phone_numbers }}
                    </div>
                    <a href="mailto:softballsingidunum@gmail.com" class="email-link">{{ contactData.email }}</a>
                    <div class="donate-line"></div>
                    <address v-html="contactData.address">
                        <h2 class="subheader2">ADDRESS</h2>
                        {{ contactData.address }}
                    </address>
                </div>
                <div class="col-lg-8">
                    <form v-on:submit.prevent>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input  novalidate="true" @keyup="onEmailInput" type="email" class="form-control" id="inputEmail" :value="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <input @keyup="onFullNameInput" type="text" class="form-control" id="inputName" :value="fullName" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input @keyup="onPhoneInput" type="text" class="form-control" id="inputAddress" :value="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea @keyup="onMessageInput" class="form-control" id="exampleFormControlTextarea1" :value="message" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button @click="onSend" type="submit" class="btn btn-primary submit">Send</button>
                    </form>
                    <div class="messages" v-if="messages.length > 0">
                        <p v-for="message in messages">{{ message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { mapActions, mapGetters } from 'vuex';
export default {
    name: 'Contact',
    data(){
        return {
        email: '',
        fullName: '',
        phone: '',
        message: '',
        messages: [],
        loading: true,
        }
    },
    computed: {
        ...mapGetters(['contactData']),
    },
    methods: {
        ...mapActions(['fetchContactData', 'sendMessage']),
        onSend: async function(event) {
            this.validateInputs()
            if (this.messages.length > 0) {
                return;
            }
            const data = {
                email: this.email,
                fullName: this.fullName,
                phone: this.phone,
                message: this.message,
            }
            const response = await this.sendMessage(data);
            this.messages = [response.message];
            this.email = '';
            this.fullName = '';
            this.phone = '';
            this.message = '';
        },
        onEmailInput: function(event) {
            this.email = event.target.value;
        },
        onFullNameInput: function(event) {
            this.fullName = event.target.value;
        },
        onPhoneInput: function(event) {
            this.phone = event.target.value;
        },
        onMessageInput: function(event) {
            this.message = event.target.value;
        },
        validateInputs: function() {
            this.messages = [];
            if (!this.email) {
                this.messages.push("Email field is required.");
                return;
            }
            if (!this.validEmail(this.email)) {
                this.messages.push('Valid email is required.');
                return;
            }
            if (!this.fullName) {
                this.messages.push("Name field is required.");
                return;
            }
            if (!this.message) {
                this.messages.push("Message field is required.");
                return;
            }
            if (this.message.length < 11) {
                this.messages.push("Message should be at least 10 characters long.");
                return;
            } 
        },
        validEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
        },
    },
    async created() {
        await this.fetchContactData();
        this.loading = false;
    },
}
</script>


<style lang="scss">
    .content .contact {
        .main-header {
            font-size: 55px;
            text-transform: uppercase;
            text-align: left;
            align-self: flex-start;
            margin-bottom: 5vw;
        }
        .subheader2 {
            font-weight: bold;
            font-size: 16px;
        }
        .phone-numbers {
            margin-bottom: 20px;
            p {
                margin: 0;
                font-size: 15px;
                color: rgba(255,255,255,0.6);
            }
        }
        address p {
            margin: 0;
            font-size: 15px;
            color: rgba(255,255,255,0.6);
        }
        .email-link {
            text-decoration: none;
            color: rgba(255,255,255,0.9);
            color: rgba(255,255,255,0.6);
        }
        form {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            input,
            textarea {
                outline: none;
                border-radius: 0;
                background-color: #3D667A;
                border: none;
                border-bottom: 1px solid #ced4da;
                color: rgba(255,255,255,0.9);
                -webkit-transition: border-bottom 0.5s; /* Safari */
                transition: border-bottom 0.5s;
            }
            textarea {
                resize: none;
            }
            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                color: rgba(255,255,255,0.9);
                opacity: 1; /* Firefox */
            }
            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                color: rgba(255,255,255,0.9);
            }
            ::-ms-input-placeholder { /* Microsoft Edge */
                color: rgba(255,255,255,0.9);
            }
            input:focus,
            textarea:focus {
                border-bottom: none;
                box-shadow: none;
            }
            .submit {
                width: 9vw;
                align-self: center;
                border: none;
            }
            .submit:active {
                background-color: transparent;
            }
            .btn-primary:not(:disabled):not(.disabled):active:focus {
                box-shadow: none;
            }
        }
        @media (max-width: 992px) {
            .col-lg-4 {
                text-align: center;
            }
            .donate-line {
                margin: 30px auto 40px;
            }
            address {
                margin-bottom: 2rem;
            }
            .main-header {
                font-size: 46px;
                align-self: center;
            }
        }
        @media (max-width: 815px) {
            .main-header {
                font-size: 35px;
            }
        }
        @media (max-width: 575px) {
            .main-header {
                font-size: 30px;
            }
            .subheader2 {
                padding-top: 0;
            }
        }
    }
    .contact {
        height: 100vh;
        background-color: #3D667A;
        padding: 14vh 0;
        color: rgba(255,255,255,0.9);
        display: flex;
        flex-direction: column;
        justify-content: center;
        .container {
            display: flex;
            flex-direction: column;
            .donate-line {
                margin-top: 30px;
                border: 1px solid rgba(255,255,255,0.9);
                width: 4vw;
                margin-bottom: 30px;
            }
        }
        @media (max-width: 815px) {
            height: auto;
            .container {
            }
        }
        @media (max-width: 575px) {
            .container {
                
            }
        }
    }
</style>
