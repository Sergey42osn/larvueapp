export default{
	actions:{},
	mutations: {
	    UPDATE_AUTH_STATE: (state, data) => {
	     	console.log(data);

	     if (data) {
	     	state.authState.state = true;
	     }else{
			state.authState.state = false;
		  }

	      //console.log(state.pages);
	    },
	},
	state:{
		authState:{
			state:false,
		}
	},
	getters:{
		authState(state){
			return state.authState
		}
	}
}