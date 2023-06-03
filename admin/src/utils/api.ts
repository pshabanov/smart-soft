import toast from '@/utils/toast'
import { authenticate, token } from '@/utils'
import type { FetchOptions, Response } from '@/shared/response/response.model'
import { HttpStatusAccidence, StatusCode } from '@/shared/response/response.model'
import ky from 'ky'
import type { HttpMethod } from 'ky/distribution/types/options'

const BASE_URL = import.meta.env.VITE_BASE_URL

async function showErrorMessage (status: HttpStatusAccidence) {
    if (status === HttpStatusAccidence.AUTHORIZED) {
        await new authenticate().logout()
    } else if (status === HttpStatusAccidence.BAD_REQUEST) {
        toast.error('Внутренние проблемы с сервером!')
    } else if (status === HttpStatusAccidence.FAILED_DATA) {
        toast.error('Введены не все или неверные данные!')
    } else if (status === HttpStatusAccidence.NOT_FOUND) {
        toast.error('Такой функционал не реализован!')
    } else if (status === HttpStatusAccidence.FORBIDDEN) {
        toast.error('У вас нет доступа!')
    } else if (status === HttpStatusAccidence.BAD_METHOD) {
        toast.error('Не правильный метод')
    } else {
        toast.error(`Сервер не доступен!`)
    }
}

function showMessage(code: StatusCode, method: HttpMethod = 'get', server_message: string, message?: string) {
    if (code === StatusCode.SUCCESS) {
        if (message && server_message === null) {
            toast.success(message)
        } else if (server_message && method.toLowerCase() != 'get') {
            toast.success(server_message)
        }
    } else if (code === StatusCode.WARNING) {
        toast.warning(`[${ StatusCode.WARNING }] ` + server_message)
    } else if (code === StatusCode.EXCEPTION) {
        toast.error(`[${ StatusCode.EXCEPTION }] ` + server_message)
    } else {
        toast.error(`Не известная ошибка!`)
    }
}

export const api = async <T>({url, ...options}: FetchOptions, message: string = ''): Promise<T> => {
    const response = await ky(url, {
        ...options,
        prefixUrl: `${ BASE_URL }`,
        method: options.method ? options.method : 'get',
        headers: {
            'authorization': 'Bearer ' + token(),
        },
        timeout: 60000,
    })
        .json<Response<T>>()
        .catch((error) => {
            showErrorMessage(error.response?.status || 'Сервер не доступен')
            return Promise.reject(error)
        })
    showMessage(response.resultCode, options.method, response.message, message)
    if (response.resultCode === 'SUCCESS') {
        return Promise.resolve(response.data)
    }
    return Promise.reject(response.error)
}

