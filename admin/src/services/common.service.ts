import ky from 'ky'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const CommonService = () => {

    const uploadImage = async (file: File, path: string): Promise<string> => {
        const formData = new FormData()
        formData.append('files', file)
        formData.append('path', path)
        const response: { image: string } = await ky('upload-image', {
            prefixUrl: `${BASE_URL}`,
            method: 'post',
            body: formData,
            timeout: 60000,
        }).json()

        return response['image']
    }

    return {
        uploadImage
    }
}