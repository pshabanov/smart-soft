import { useUserStore } from '@/stores/user.store'
import router from '@/router'
import { PAGES } from '@/model'
import type { UserInfoType } from '@/entities/user/user.model'


export function token() {
    let token = useUserStore().getToken()

    if (!token) useUserStore().logout()
    else return token
}

export class authenticate {
    async putUserInfoInLS(data: UserInfoType, access_token: string, is_redirect = true) {
        const obj: any = {
            userinfo: data,
            token: access_token,
        }

        if (obj.userinfo) localStorage.setItem('USER_DATA', JSON.stringify(obj))
        useUserStore().setAuth(true)
        useUserStore().setUserInfoAndToken(obj.userinfo, obj.token)

        if (is_redirect) await router.push(PAGES.HOME)
    }

    async getUserInfoFromLS() {
        if (!localStorage.getItem('USER_DATA')) {
            useUserStore().setAuth(false)
            await router.push(PAGES.LOGIN)
        } else {
            const obj: any = JSON.parse(localStorage.getItem('USER_DATA') || '')
            useUserStore().setAuth(true)
            useUserStore().setUserInfoAndToken(obj.userinfo, obj.token)
        }
    }

    async logout() {
        useUserStore().logout()
        localStorage.removeItem('USER_DATA')
        await router.push(PAGES.LOGIN)
    }
}

