import ky from 'ky'
import {useUserStore} from '@/stores'
import type {ServicesRequestType, SolutionsRequestType} from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const SolutionsService = () => {

    const solutions = async (): Promise<{ data: SolutionsRequestType[] }> => await ky('solutions', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const solutionsById = async (id: number): Promise<{ data: SolutionsRequestType }> => await ky(`solutions/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const createSolutions = async (data: SolutionsRequestType, files: Blob[]): Promise<SolutionsRequestType> => {
        const formData = new FormData()
        formData.append('title', data.title)
        formData.append('description', data.description)
        formData.append('solution', data.solution)
        formData.append('image', data.image)
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`solutions`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateSolutions = async (data: SolutionsRequestType): Promise<{data: SolutionsRequestType}> => {

        return await ky(`solutions/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

    const solutionsDelete = async (id: number): Promise<number | null> => await ky(`solutions/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        solutions,
        solutionsById,
        solutionsDelete,
        createSolutions,
        updateSolutions,
    }
}
