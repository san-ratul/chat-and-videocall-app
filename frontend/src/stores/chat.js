import {defineStore} from "pinia";
import axios         from "../axios";
import isEmpty       from "../is_empty";

const UseChatStore = defineStore({
    id: 'chat',
    state: () => ({
        userList: [],
        selectedUser: {},
        messages: [],
    }),
    getters: {
        getUserList: (state) => state.userList,
    },
    actions: {
        async setUserList() {
            if(isEmpty(this.userList)) {
                await axios.get("/users").then(response => {
                    this.userList = response.data;
                    this.selectedUser = response.data[0];
                });
            } else{
                this.selectedUser = this.userList[0];
            }
        },
        setSelectedUser(user) {
            this.selectedUser = user;
        }
    }
})

export default UseChatStore;